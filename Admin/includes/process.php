<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'conn.php';
session_start();

class Process
{
    private $conn;

    public function __construct()
    {
        ob_start();
        $this->conn = con();
    }

    function __destruct()
    {
        if ($this->conn) {
            mysqli_close($this->conn);
        }
        ob_end_flush();
    }

    function login()
    {
        error_log('Login method called');
        error_log('POST data: ' . print_r($_POST, true));

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid request method'
            ]);
            return false;
        }

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($username) || empty($password)) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Username and password are required'
            ]);
            return false;
        }

        $stmt = mysqli_prepare($this->conn, "SELECT user_id, username, password, profile_image FROM users WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) === 1) {
            $user = mysqli_fetch_assoc($result);

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['profile_image'] = $user['profile_image'];
                $_SESSION['login_success'] = true;

                echo json_encode([
                    'status' => 'success',
                    'message' => 'Login successful',
                    'redirect' => 'index.php?page=dashboard'
                ]);
                return true;
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Invalid username or password'
                ]);
                return false;
            }
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'User not found'
            ]);
            return false;
        }
    }

    function logout()
    {
        session_unset();
        session_destroy();
        header("Location: ../index.php");
        exit();
    }


    function addService()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return json_encode([
                'status' => 'error',
                'message' => 'Invalid request method'
            ]);
        }

        $service_name = $_POST['service_name'] ?? '';
        $description = $_POST['description'] ?? '';
        $category = strtolower($_POST['category'] ?? '');

        // If Other is selected
        if ($category === 'add-new' && !empty($_POST['new_category'])) {
            $category = strtolower(trim($_POST['new_category']));
        }

        $image = null;

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/services/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
            $uploadPath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                $image = $fileName;
            }
        }

        $stmt = mysqli_prepare($this->conn, "INSERT INTO services (service_name, description, category, image) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssss", $service_name, $description, $category, $image);

        if (mysqli_stmt_execute($stmt)) {
            return json_encode([
                'status' => 'success',
                'message' => 'Service added successfully'
            ]);
        } else {
            return json_encode([
                'status' => 'error',
                'message' => 'Failed to add service'
            ]);
        }
    }


    function editService()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid request method'
            ]);
            exit;
        }

        $service_id = $_POST['service_id'] ?? null;
        if (!$service_id) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Service ID is required'
            ]);
            exit;
        }

        $service_name = $_POST['service_name'] ?? '';
        $description = $_POST['description'] ?? '';
        $category = strtolower($_POST['category'] ?? '');

        // If "Other" is selected, use the value from 'new_category'
        if ($category === 'add-new' && !empty($_POST['new_category'])) {
            $category = strtolower(trim($_POST['new_category']));
        }

        $image = null;

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/services/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
            $uploadPath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                $image = $fileName;
            }
        }

        if ($image) {
            $stmt = mysqli_prepare($this->conn, "UPDATE services SET service_name = ?, description = ?, category = ?, image = ? WHERE service_id = ?");
            mysqli_stmt_bind_param($stmt, "ssssi", $service_name, $description, $category, $image, $service_id);
        } else {
            $stmt = mysqli_prepare($this->conn, "UPDATE services SET service_name = ?, description = ?, category = ? WHERE service_id = ?");
            mysqli_stmt_bind_param($stmt, "sssi", $service_name, $description, $category, $service_id);
        }

        if (mysqli_stmt_execute($stmt)) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Service updated successfully'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to update service'
            ]);
        }
    }



    function deleteService()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return json_encode([
                'status' => 'error',
                'message' => 'Invalid request method'
            ]);
        }

        if (!isset($_POST['service_id'])) {
            return json_encode([
                'status' => 'error',
                'message' => 'Service ID is required'
            ]);
        }

        $service_id = $_POST['service_id'];

        $stmt = mysqli_prepare($this->conn, "SELECT image FROM services WHERE service_id = ?");
        mysqli_stmt_bind_param($stmt, "i", $service_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $service = mysqli_fetch_assoc($result);

        if ($service && !empty($service['image'])) {
            $imagePath = "uploads/services/" . $service['image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $stmt = mysqli_prepare($this->conn, "DELETE FROM services WHERE service_id = ?");
        mysqli_stmt_bind_param($stmt, "i", $service_id);

        if (mysqli_stmt_execute($stmt)) {
            return json_encode([
                'status' => 'success',
                'message' => 'Service deleted successfully'
            ]);
        } else {
            return json_encode([
                'status' => 'error',
                'message' => 'Failed to delete service'
            ]);
        }
    }


    function getServiceFeatures($serviceId)
    {
        if (!$serviceId) {
            return json_encode([
                'status' => 'error',
                'message' => 'Invalid service ID'
            ]);
        }

        $stmt = mysqli_prepare($this->conn, "SELECT * FROM service_feature WHERE service_id = ?");
        mysqli_stmt_bind_param($stmt, "i", $serviceId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $features = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $features[] = $row;
        }

        return json_encode($features);
    }

    function addServiceFeature()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return json_encode([
                'status' => 'error',
                'message' => 'Invalid request method'
            ]);
        }

        $service_id = $_POST['service_id'] ?? '';
        $name = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? '';
        $image = null;

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/service-features/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
            $uploadPath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                $image = $fileName;
            }
        }

        $stmt = mysqli_prepare($this->conn, "INSERT INTO service_features (service_id, name, description, image) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "isss", $service_id, $name, $description, $image);

        if (mysqli_stmt_execute($stmt)) {
            return json_encode([
                'status' => 'success',
                'message' => 'Feature added successfully'
            ]);
        } else {
            return json_encode([
                'status' => 'error',
                'message' => 'Failed to add feature'
            ]);
        }
    }
    function editServiceFeature()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid request method'
            ]);
            exit;
        }

        $service_feature_id = $_POST['service_feature_id'] ?? null;
        if (!$service_feature_id) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Service Feature ID is required'
            ]);
            exit;
        }

        $service_feature_name = $_POST['service_feature_name'] ?? '';
        $description = $_POST['description'] ?? '';
        $image = null;

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/service-features/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
            $uploadPath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                $image = $fileName;
            }
        }

        if ($image) {
            $stmt = mysqli_prepare($this->conn, "UPDATE service_features SET name = ?, description = ?, image = ? WHERE service_feature_id = ?");
            mysqli_stmt_bind_param($stmt, "sssi", $service_feature_name, $description, $image, $service_feature_id);
        } else {
            $stmt = mysqli_prepare($this->conn, "UPDATE service_features SET name = ?, description = ? WHERE service_feature_id = ?");
            mysqli_stmt_bind_param($stmt, "ssi", $service_feature_name, $description, $service_feature_id);
        }

        if (mysqli_stmt_execute($stmt)) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Service Feature updated successfully'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to update Service Feature'
            ]);
        }
    }
    function deleteServiceFeature()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return json_encode([
                'status' => 'error',
                'message' => 'Invalid request method'
            ]);
        }

        if (!isset($_POST['service_feature_id'])) {
            return json_encode([
                'status' => 'error',
                'message' => 'Service ID is required'
            ]);
        }

        $service_feature_id = $_POST['service_feature_id'];

        $stmt = mysqli_prepare($this->conn, "SELECT image FROM service_features WHERE service_feature_id = ?");
        mysqli_stmt_bind_param($stmt, "i", $service_feature_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $service_feature = mysqli_fetch_assoc($result);

        if ($service_feature && !empty($service['image'])) {
            $imagePath = "uploads/service-features/" . $service_feature['image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $stmt = mysqli_prepare($this->conn, "DELETE FROM service_features WHERE service_feature_id = ?");
        mysqli_stmt_bind_param($stmt, "i", $service_feature_id);

        if (mysqli_stmt_execute($stmt)) {
            return json_encode([
                'status' => 'success',
                'message' => 'Service deleted successfully'
            ]);
        } else {
            return json_encode([
                'status' => 'error',
                'message' => 'Failed to delete service'
            ]);
        }
    }
    function addClient()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return json_encode([
                'status' => 'error',
                'message' => 'Invalid request method'
            ]);
        }

        $service_id = $_POST['service_id'] ?? '';
        $client_name = $_POST['client_name'] ?? '';
        $description = $_POST['description'] ?? '';
        $image = null;

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/clients/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
            $uploadPath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                $image = $fileName;
            }
        }

        $stmt = mysqli_prepare($this->conn, "INSERT INTO clients (service_id, client_name, description, image) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "isss", $service_id, $client_name, $description, $image);

        if (mysqli_stmt_execute($stmt)) {
            return json_encode([
                'status' => 'success',
                'message' => 'Client added successfully'
            ]);
        } else {
            return json_encode([
                'status' => 'error',
                'message' => 'Failed to add Client'
            ]);
        }
    }
    function editClient()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid request method'
            ]);
            exit;
        }

        $client_id = $_POST['client_id'] ?? null;
        if (!$client_id) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Client ID is required'
            ]);
            exit;
        }

        $service_id = $_POST['service_id'] ?? '';
        $client_name = $_POST['client_name'] ?? '';
        $description = $_POST['description'] ?? '';
        $image = null;

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/clients/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
            $uploadPath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                $image = $fileName;
            }
        }

        if ($image) {
            $stmt = mysqli_prepare($this->conn, "UPDATE clients SET client_name = ?, description = ?, service_id = ? ,image = ? WHERE client_id = ?");
            mysqli_stmt_bind_param($stmt, "ssisi", $client_name, $description, $service_id, $image, $client_id);
        } else {
            $stmt = mysqli_prepare($this->conn, "UPDATE clients SET client_name = ?, description = ?, service_id = ? WHERE client_id = ?");
            mysqli_stmt_bind_param($stmt, "ssii", $client_name, $description, $service_id, $client_id);
        }

        if (mysqli_stmt_execute($stmt)) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Client updated successfully'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to update Client'
            ]);
        }
    }

    function deleteClient()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return json_encode([
                'status' => 'error',
                'message' => 'Invalid request method'
            ]);
        }

        if (!isset($_POST['client_id'])) {
            return json_encode([
                'status' => 'error',
                'message' => 'Client ID is required'
            ]);
        }

        $client_id = $_POST['client_id'];

        $stmt = mysqli_prepare($this->conn, "SELECT image FROM clients WHERE client_id = ?");
        mysqli_stmt_bind_param($stmt, "i", $client_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $clients = mysqli_fetch_assoc($result);

        if ($clients && !empty($service['image'])) {
            $imagePath = "uploads/clients/" . $clients['image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $stmt = mysqli_prepare($this->conn, "DELETE FROM clients WHERE client_id = ?");
        mysqli_stmt_bind_param($stmt, "i", $client_id);

        if (mysqli_stmt_execute($stmt)) {
            return json_encode([
                'status' => 'success',
                'message' => 'Client deleted successfully'
            ]);
        } else {
            return json_encode([
                'status' => 'error',
                'message' => 'Failed to delete Client'
            ]);
        }
    }

    function companyInfo()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid request method'
            ]);
            exit;
        }

        if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/company/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = uniqid() . '_' . basename($_FILES['logo']['name']);
            $uploadPath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['logo']['tmp_name'], $uploadPath)) {
                $value = $fileName;
                $field = 'logo';
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Failed to upload logo'
                ]);
                exit;
            }
        } else {
            if (!isset($_POST['field']) || !isset($_POST['value'])) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Missing field or value'
                ]);
                exit;
            }

            $field = $_POST['field'];
            $value = $_POST['value'];

            $allowedFields = ['email', 'phone', 'address'];
            if (!in_array($field, $allowedFields)) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Invalid field'
                ]);
                exit;
            }
        }

        $checkStmt = mysqli_prepare($this->conn, "SELECT COUNT(*) FROM company_info WHERE company_id = 1");
        mysqli_stmt_execute($checkStmt);
        mysqli_stmt_bind_result($checkStmt, $count);
        mysqli_stmt_fetch($checkStmt);
        mysqli_stmt_close($checkStmt);

        if ($count > 0) {
            $stmt = mysqli_prepare($this->conn, "UPDATE company_info SET $field = ? WHERE company_id = 1");
        } else {
            $stmt = mysqli_prepare($this->conn, "INSERT INTO company_info (company_id, $field) VALUES (1, ?)");
        }

        mysqli_stmt_bind_param($stmt, "s", $value);

        if (mysqli_stmt_execute($stmt)) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Company information updated successfully'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to update company information'
            ]);
        }

        mysqli_stmt_close($stmt);
    }
    function addHardware()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return json_encode([
                'status' => 'error',
                'message' => 'Invalid request method'
            ]);
        }

        $hardware_name = $_POST['hardware_name'] ?? '';
        $description = $_POST['description'] ?? '';
        $image = null;

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/hardware/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
            $uploadPath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                $image = $fileName;
            }
        }

        $stmt = mysqli_prepare($this->conn, "INSERT INTO hardware (name, description, image) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sss", $hardware_name, $description, $image);

        if (mysqli_stmt_execute($stmt)) {
            return json_encode([
                'status' => 'success',
                'message' => 'Service added successfully'
            ]);
        } else {
            return json_encode([
                'status' => 'error',
                'message' => 'Failed to add service'
            ]);
        }
    }

    function editHardware()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid request method'
            ]);
            exit;
        }

        $hardware_id = $_POST['hardware_id'] ?? null;
        if (!$hardware_id) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Hardware ID is required'
            ]);
            exit;
        }

        $hardware_name = $_POST['hardware_name'] ?? '';
        $description = $_POST['description'] ?? '';
        $image = null;

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/hardware/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
            $uploadPath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                $image = $fileName;
            }
        }

        if ($image) {
            $stmt = mysqli_prepare($this->conn, "UPDATE hardware SET name = ?, description = ?, image = ? WHERE hardware_id = ?");
            mysqli_stmt_bind_param($stmt, "sssi", $hardware_name, $description, $image, $hardware_id);
        } else {
            $stmt = mysqli_prepare($this->conn, "UPDATE hardware SET name = ?, description = ? WHERE hardware_id = ?");
            mysqli_stmt_bind_param($stmt, "ssi", $hardware_name, $description, $hardware_id);
        }

        if (mysqli_stmt_execute($stmt)) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Hardware updated successfully'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to update hardware'
            ]);
        }
    }

    function deleteHardware()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return json_encode([
                'status' => 'error',
                'message' => 'Invalid request method'
            ]);
        }

        if (!isset($_POST['hardware_id'])) {
            return json_encode([
                'status' => 'error',
                'message' => 'Hardware ID is required'
            ]);
        }

        $hardware_id = $_POST['hardware_id'];

        $stmt = mysqli_prepare($this->conn, "SELECT image FROM hardware WHERE hardware_id = ?");
        mysqli_stmt_bind_param($stmt, "i", $hardware_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $hardware = mysqli_fetch_assoc($result);

        if ($hardware && !empty($hardware['image'])) {
            $imagePath = "uploads/hardware/" . $hardware['image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $stmt = mysqli_prepare($this->conn, "DELETE FROM hardware WHERE hardware_id = ?");
        mysqli_stmt_bind_param($stmt, "i", $hardware_id);

        if (mysqli_stmt_execute($stmt)) {
            return json_encode([
                'status' => 'success',
                'message' => 'Hardware deleted successfully'
            ]);
        } else {
            return json_encode([
                'status' => 'error',
                'message' => 'Failed to delete Hardware'
            ]);
        }
    }
    function addUser()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return json_encode([
                'status' => 'error',
                'message' => 'Invalid request method'
            ]);
        }

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $image = null;

        $stmt = mysqli_prepare($this->conn, "SELECT id FROM users WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            return json_encode([
                'status' => 'error',
                'message' => 'Username already exists'
            ]);
        }

        mysqli_stmt_close($stmt);

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/users/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
            $uploadPath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                $image = $fileName;
            }
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = mysqli_prepare($this->conn, "INSERT INTO users (username, password, profile_image) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sss", $username, $hashedPassword, $image);

        if (mysqli_stmt_execute($stmt)) {
            return json_encode([
                'status' => 'success',
                'message' => 'User added successfully'
            ]);
        } else {
            return json_encode([
                'status' => 'error',
                'message' => 'Failed to add user'
            ]);
        }

        mysqli_stmt_close($stmt);
    }


    function updateUser()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return json_encode([
                'status' => 'error',
                'message' => 'Invalid request method'
            ]);
        }

        $userId = $_POST['user_id'] ?? '';
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $image = null;

        if (!$userId || !$username) {
            return json_encode([
                'status' => 'error',
                'message' => 'User ID and username are required'
            ]);
        }

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/users/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
            $uploadPath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                $image = $fileName;

                $stmt = mysqli_prepare($this->conn, "SELECT profile_image FROM users WHERE user_id = ?");
                mysqli_stmt_bind_param($stmt, "i", $userId);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $row = mysqli_fetch_assoc($result);

                if ($row && $row['profile_image']) {
                    $oldImagePath = $uploadDir . $row['profile_image'];
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }
        }

        $updateFields = [];
        $params = [];
        $types = '';

        $updateFields[] = "username = ?";
        $params[] = $username;
        $types .= 's';

        if (!empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $updateFields[] = "password = ?";
            $params[] = $hashedPassword;
            $types .= 's';
        }

        if ($image) {
            $updateFields[] = "profile_image = ?";
            $params[] = $image;
            $types .= 's';
        }

        $params[] = $userId;
        $types .= 'i';

        $query = "UPDATE users SET " . implode(', ', $updateFields) . " WHERE user_id = ?";

        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, $types, ...$params);

        if (mysqli_stmt_execute($stmt)) {
            return json_encode([
                'status' => 'success',
                'message' => 'User updated successfully'
            ]);
        } else {
            return json_encode([
                'status' => 'error',
                'message' => 'Failed to update user'
            ]);
        }
    }
    function deleteUser()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return json_encode([
                'status' => 'error',
                'message' => 'Invalid request method'
            ]);
        }

        if (!isset($_POST['user_id'])) {
            return json_encode([
                'status' => 'error',
                'message' => 'User ID is required'
            ]);
        }

        $user_id = $_POST['user_id'];

        $stmt = mysqli_prepare($this->conn, "SELECT profile_image FROM users WHERE user_id = ?");
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        if ($user && !empty($users['profile_image'])) {
            $imagePath = "uploads/users/" . $user['profile_image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $stmt = mysqli_prepare($this->conn, "DELETE FROM users WHERE user_id = ?");
        mysqli_stmt_bind_param($stmt, "i", $user_id);

        if (mysqli_stmt_execute($stmt)) {
            return json_encode([
                'status' => 'success',
                'message' => 'User deleted successfully'
            ]);
        } else {
            return json_encode([
                'status' => 'error',
                'message' => 'Failed to delete User'
            ]);
        }
    }
    public function updateUserProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid request method'
            ]);
            exit;
        }

        $userId = $_POST['user_id'] ?? null;

        if (!$userId) {
            echo json_encode([
                'status' => 'error',
                'message' => 'User ID is required'
            ]);
            exit;
        }

        if (isset($_FILES['userProfile']) && $_FILES['userProfile']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/users/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = uniqid() . '_' . basename($_FILES['userProfile']['name']);
            $uploadPath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['userProfile']['tmp_name'], $uploadPath)) {
                $stmt = mysqli_prepare($this->conn, "UPDATE users SET profile_image = ? WHERE user_id = ?");
                mysqli_stmt_bind_param($stmt, "si", $fileName, $userId);
                if (!mysqli_stmt_execute($stmt)) {
                    echo json_encode([
                        'status' => 'error',
                        'message' => 'Failed to update profile picture'
                    ]);
                    exit;
                }
                mysqli_stmt_close($stmt);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Failed to upload profile picture'
                ]);
                exit;
            }
        }

        if (!empty($_POST['oldPassword']) && !empty($_POST['newPassword']) && !empty($_POST['confirmPassword'])) {
            $oldPassword = $_POST['oldPassword'];
            $newPassword = $_POST['newPassword'];
            $confirmPassword = $_POST['confirmPassword'];

            $stmt = mysqli_prepare($this->conn, "SELECT password FROM users WHERE user_id = ?");
            mysqli_stmt_bind_param($stmt, "i", $userId);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $storedPassword);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);

            if (!password_verify($oldPassword, $storedPassword)) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Incorrect current password'
                ]);
                exit;
            }

            // if (strlen($newPassword) < 6) {
            //     echo json_encode([
            //         'status' => 'error',
            //         'message' => 'New password must be at least 6 characters long'
            //     ]);
            //     exit;
            // }

            if ($newPassword !== $confirmPassword) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'New passwords do not match'
                ]);
                exit;
            }

            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $stmt = mysqli_prepare($this->conn, "UPDATE users SET password = ? WHERE user_id = ?");
            mysqli_stmt_bind_param($stmt, "si", $hashedPassword, $userId);

            if (!mysqli_stmt_execute($stmt)) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Failed to update password'
                ]);
                exit;
            }

            mysqli_stmt_close($stmt);
        }

        echo json_encode([
            'status' => 'success',
            'message' => 'Profile updated successfully'
        ]);
        exit;
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'login') {
    $process = new Process();
    $process->login();
    exit();
}
