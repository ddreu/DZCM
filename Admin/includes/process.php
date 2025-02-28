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
                    'redirect' => 'dashboard.php'
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


    function addService() {
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
    
    function getServiceFeatures($serviceId) {
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
    
    function addServiceFeature() {
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
            $uploadDir = 'uploads/features/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            
            $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
            $uploadPath = $uploadDir . $fileName;
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                $image = $fileName;
            }
        }
    
        $stmt = mysqli_prepare($this->conn, "INSERT INTO service_feature (service_id, name, description, image) VALUES (?, ?, ?, ?)");
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
}

if (isset($_GET['action']) && $_GET['action'] == 'login') {
    $process = new Process();
    $process->login();
    exit();
}
