<?php
session_start();
require_once 'conn.php';
$conn = con();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $conn->prepare("SELECT user_id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];

            echo json_encode([
                'status' => 'success',
                'message' => 'Login successful',
                'redirect' => 'dashboard.php'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid username or password'
            ]);
        }
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid username or password'
        ]);
    }

    $stmt->close();
    $conn->close();
    exit();
}
?>
