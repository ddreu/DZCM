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

        $stmt = mysqli_prepare($this->conn, "SELECT user_id, username, password FROM users WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) === 1) {
            $user = mysqli_fetch_assoc($result);

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];

                echo json_encode([
                    'status' => 'success',
                    'message' => 'Login successful',
                    'redirect' => 'index.php'
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

        $stmt = mysqli_prepare($this->conn, "INSERT INTO services (service_name, description, image) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sss", $service_name, $description, $image);

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
            $stmt = mysqli_prepare($this->conn, "UPDATE services SET service_name = ?, description = ?, image = ? WHERE service_id = ?");
            mysqli_stmt_bind_param($stmt, "sssi", $service_name, $description, $image, $service_id);
        } else {
            $stmt = mysqli_prepare($this->conn, "UPDATE services SET service_name = ?, description = ? WHERE service_id = ?");
            mysqli_stmt_bind_param($stmt, "ssi", $service_name, $description, $service_id);
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
}

if (isset($_GET['action']) && $_GET['action'] == 'login') {
    $process = new Process();
    $process->login();
    exit();
}
