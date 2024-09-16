<?php
    include('db_connect.php');

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        
        $sql = "INSERT INTO users(name, email, message) VALUES ('$name', '$email', '$message')";

        if($conn->query($sql) === TRUE){
            echo "The data was successfully inserted.";
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Invalid request method.";
    }
?>
 <!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Process Form</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
       <h2>This is for process form</h2>
        
        <script src="" async defer></script>
    </body>
 </html>