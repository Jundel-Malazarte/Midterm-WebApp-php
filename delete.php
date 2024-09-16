<?php
include "db_connect.php";

if (isset($_GET['id'])) {
<<<<<<< HEAD
    // Use the correct variable name for the user ID
    $user_id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Execute the delete query
    $sql = "DELETE FROM `users` WHERE `user_ID` = '$user_id'";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: display_users.php?msg=User deleted successfully");
        exit();
    } else {
        // Redirect with an error message
        header("Location: display_users.php?msg=Error deleting user: " . mysqli_error($conn));
        exit();
    }
} else {
    // Redirect if no ID is provided
    header("Location: display_users.php?msg=No User ID provided");
    exit();
}
=======
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
>>>>>>> 41f3175f2ad80c81e1fe86c232b62c64bae46151
