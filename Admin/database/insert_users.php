<?php
// include 'includes/conn.php';


function con()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $myDB = "dezcom";

    $conn = mysqli_connect($servername, $username, $password, $myDB);
    if ($conn->connect_error) {
        echo "Connection failed: " . $conn->connect_error;
    } else {
        return $conn;
    }
}

$conn = con();

if (!$conn) {
    die("Database connection failed!");
}

$plainPassword = "1";
$hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, password, profile_image) 
        VALUES ('admin', ?, NULL)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $hashedPassword);

if ($stmt->execute()) {
    echo "Admin user inserted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
