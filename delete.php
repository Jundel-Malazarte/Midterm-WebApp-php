<?php
include "db_connect.php";

if (isset($_GET['id'])) {
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
