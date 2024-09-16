<?php
<<<<<<< HEAD
    include('db_connect.php');

    // Initialize an empty message variable
    $success_msg = $error_msg = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve user input
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Prepare the SQL statement with placeholders
        $stmt = $conn->prepare("INSERT INTO users (name, email, message) VALUES (?, ?, ?)");

        // Bind the parameters to the placeholders
        $stmt->bind_param("sss", $name, $email, $message);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to display_users.php with a success message
            header("Location: display_users.php?msg=Successfully added!");
            exit();
        } else {
            $error_msg = "Error: " . $stmt->error;
        }
        
        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
=======
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
>>>>>>> 41f3175f2ad80c81e1fe86c232b62c64bae46151
?>

<!DOCTYPE html>
<html>
<<<<<<< HEAD
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Index Register</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <!-- Display success or error message -->
    <?php if (!empty($error_msg)): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error_msg; ?>
        </div>
    <?php endif; ?>

    <!-- Form for User Data -->
    <div id="form-container">
        <form action="index.php" method="post" onsubmit="return validateForm()">
            <h2 class="header">Submit your message here!</h2>
=======
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
>>>>>>> 41f3175f2ad80c81e1fe86c232b62c64bae46151
            <div class="form-group">
                <label for="name">Name: </label>
                <input class="text" id="name" name="name" required>
            </div>
            <div class="form-group">
<<<<<<< HEAD
                <label for="email">Email:</label>
                <input class="text" id="email" name="email" required>
            </div>
            <div class="form-group-message">
                <label for="message">Message: </label>
                <input class="text" id="message" name="message" required>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn btn-success" id="submit">Submit</button>
                <button type="reset" class="btn btn-danger" id="reset">Reset</button>
            </div>
                
        </form>
    </div>

    <!-- JavaScript Validation -->
    <script>
        function validateForm() {
=======
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
>>>>>>> 41f3175f2ad80c81e1fe86c232b62c64bae46151
            var name = document.forms["display_users"]["name"].value;
            var email = document.forms["display_users"]["email"].value;
            var message = document.forms["display_users"]["message"].value;
          
<<<<<<< HEAD
            if (name == "" || email == "" || message == "") {
=======
            if (user_ID == "" || name == "" || email == "" || message == "") {
>>>>>>> 41f3175f2ad80c81e1fe86c232b62c64bae46151
                alert("All fields are required.");
                return false;
            }
            return true;
        }
    </script>
<<<<<<< HEAD
    <!-- Footer -->
    <footer>
    <a href="https://github.com/jundel-malazarte29" target="_blank" rel="noopener noreferrer">@malazarte</a>
    </footer>
</body>
</html>
=======
    
    </body>
</html>
>>>>>>> 41f3175f2ad80c81e1fe86c232b62c64bae46151
