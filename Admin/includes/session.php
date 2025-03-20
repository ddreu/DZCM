<?php
session_start();
include '../chat-admin/php/connection.php';
if (isset($_SESSION['user_id'])) {
    $id = mysqli_real_escape_string($conn, $_SESSION['user_id']);
    $date = $datetime->format('Y-m-d H:i');
    $conn->query("UPDATE users SET status='$date' WHERE user_id='$id'");
}
