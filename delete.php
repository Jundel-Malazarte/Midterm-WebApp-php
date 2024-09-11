<?php
include "db_connect.php";

if (isset($_GET['id'])) {
  $employee_id = mysqli_real_escape_string($conn, $_GET['id']);
  
  // Make sure the table name matches your database schema
  $sql = "DELETE FROM `users` WHERE `user_ID` = '$user_id'";
  
  if (mysqli_query($conn, $sql)) {
      header("Location: index.php?msg=User deleted successfully");
      exit();
  } else {
      header("Location: index.php?msg=Error deleting User: " . mysqli_error($conn));
      exit();
  }
} else {
  header("Location: index.php?msg=No User ID provided");
  exit();
}