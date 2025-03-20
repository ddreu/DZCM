<?php
session_start();
include_once "config.php";
$date = $datetime->format('Y-m-d H:i');
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
//$password = mysqli_real_escape_string($conn, $_POST['password']);
if (!empty($fname) && !empty($lname) && !empty($email)) {
  //validate emaail
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

    $active = $datetime->format('Y-m-d H:i');
    // $status = 'Active now';
    $ran_id = rand(time(), 100000000);
    while (true) {
      $check =  $conn->query("SELECT unique_id FROM tbl_end_users WHERE unique_id ='$ran_id'")->num_rows;
      if ($check > 0) {
        // $ran_id = rand(time(), 100000000);
      } else {
        break;
      }
    }

    $query_checking = "SELECT status, user_id FROM users WHERE status >='$date' ORDER by rand()";
    $run = mysqli_query($conn, $query_checking);

    if (mysqli_num_rows($run) > 0) {
      $row = mysqli_fetch_array($run);
      $id = $row['user_id'];
      $insert_query = mysqli_query($conn, "INSERT INTO tbl_end_users (user_reciever, unique_id, fname, lname, email, status, dateentry)
                VALUES ({$id}, {$ran_id}, '{$fname}','{$lname}', '{$email}', '{$active}','{$dateentry}')");

      if ($insert_query) {
        $select_sql2 = mysqli_query($conn, "SELECT * FROM tbl_end_users WHERE unique_id = '{$ran_id}'");
        // $select_sql2 = mysqli_query($conn, "SELECT * FROM tbl_end_users ORDER BY userid DESC LIMIT 1");
        if (mysqli_num_rows($select_sql2) > 0) {
          $result = mysqli_fetch_assoc($select_sql2);
          $_SESSION['unique_id'] = $result['unique_id'];
          $_SESSION['receiver'] = $id;
          echo "success";
          echo $_SESSION['unique_id'];
          echo $_SESSION['receiver'];
        }
      } else {
        echo "Something went wrong. Please try again!";
      }
    } else {
      echo "Sorry No online Staff For now Try again Later Thank You! Or Fill up our contact us form";
    }
  } else {
    echo "Invalid Email!";
  }
} else {
  echo "All input fields are required!";
}
