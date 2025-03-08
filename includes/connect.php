<?php
$dbName = "dezcom";
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";

// Establish connection
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "";
}

// Close the connection (optional, if needed later in the script)
// mysqli_close($conn);
?>
