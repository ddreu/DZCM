<?php
include 'includes/conn.php';

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
