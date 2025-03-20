<?php
session_start();
include_once "connection.php";
$outgoing_id = $_SESSION['user_id'];
$sql = "SELECT * FROM tbl_end_users WHERE NOT unique_id = {$outgoing_id} AND user_reciever={$outgoing_id} ORDER BY userid DESC";
$query = mysqli_query($conn, $sql);
$output = "";
if (mysqli_num_rows($query) == 0) {
    $output .= "No users are available to chat";
} elseif (mysqli_num_rows($query) > 0) {
    include_once "data.php";
}
echo $output;
