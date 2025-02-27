<?php
include 'conn.php'; // Replace with your actual connection file

$conn = con(); // Use the con() function to connect

if (!$conn) {
    die("Database connection failed!");
}

// Hash the password
$plainPassword = "1";
$hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

// Insert user data (adjusted for your table structure)
$sql = "INSERT INTO users (username, password, profile_image) 
        VALUES ('admin', ?, NULL)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $hashedPassword);

if ($stmt->execute()) {
    echo "Admin user inserted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
