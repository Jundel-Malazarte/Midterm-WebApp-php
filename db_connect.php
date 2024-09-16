<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project_webapp";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
    // else echo "Connected successfully"
?>