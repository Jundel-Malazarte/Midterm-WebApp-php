<?php
    include ('db_connect.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare the SQL statement with placeholders
    $stmt = $conn->prepare("INSERT INTO users (name, email, message) VALUES ('$name', '$email', '$message)");

    // Bind the parameters to the placeholders (all are strings in this case)
    $stmt->bind_param("sss", $name, $email, $message);

    // Execute the statement
    if ($stmt->execute()) {
        echo "The data was successfully inserted.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Index Register</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="display.css">
    </head>
<body>

    <!--
    <?php if ($error_msg != ''): ?>
                <div class="alert alert-danger" role="alert">
                <?php echo $error_msg; ?>
                 </div>
        <?php endif; ?> 
    -->

    <div class="form-container">
        <form action="display_users.php" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="user_ID">User ID:</label>
                <input class="text" id="User_id" name="User_id" required>
            </div>
            <div class="form-group">
                <label for="name">Name: </label>
                <input class="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="Email">Email:</label>
                <input class="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Message: </label>
                <input class="text" id="message" name="message" required>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-success" name="submit"></button>
            </div>
            
        </form>
    </div>
        <!-- JavaScript Validation -->
    <script>
        function validateForm() {
            var user_ID = document.forms["display_users"]["User_id"].value;
            var name = document.forms["display_users"]["name"].value;
            var email = document.forms["display_users"]["email"].value;
            var message = document.forms["display_users"]["message"].value;
          
            if (user_ID == "" || name == "" || email == "" || message == "") {
                alert("All fields are required.");
                return false;
            }
            return true;
        }
    </script>
    
    </body>
</html>