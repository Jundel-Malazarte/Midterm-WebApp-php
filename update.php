<?php
include "db_connect.php";

// Initialize variables for user data
$name = $email = $message = "";
$user_ID = "";

// Check if 'id' is provided in the URL
if (isset($_GET['id'])) {
    $user_ID = mysqli_real_escape_string($conn, $_GET['id']);

    // Fetch user data from the database
    $sql = "SELECT * FROM users WHERE user_ID = '$user_ID'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $email = $row['email'];
        $message = $row['message'];
    } else {
        die("User not found");
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // Update user data in the database
    $sql = "UPDATE users SET name='$name', email='$email', message='$message' WHERE user_ID='$user_ID'";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: display_users.php?msg=User updated successfully");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div id="form-container">
    <form name="updateForm" action="update.php?id=<?php echo $user_ID; ?>" method="post" onsubmit="return validateForm()">
        <h2 class="header">Update your info here!</h2>
        <div class="form-group">
            <label for="name">Name: </label>
            <input class="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input class="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
        </div>
        <div class="form-group-message">
            <label for="message">Message: </label>
            <input class="text" id="message" name="message" value="<?php echo htmlspecialchars($message); ?>" required>
        </div>
        <div class="btn-container">
            <button type="submit" class="btn btn-success" id="submit">Update</button>
            <button type="button" class="btn btn-danger" id="cancel" onclick="cancelUpdate()">Cancel</button>
        </div>
    </form>
</div>

<script>
    function validateForm() {
        var name = document.forms["updateForm"]["name"].value;
        var email = document.forms["updateForm"]["email"].value;
        var message = document.forms["updateForm"]["message"].value;

        if (name == "" || email == "" || message == "") {
            alert("All fields are required.");
            return false;
        }
        return true;
    }

    function cancelUpdate() {
        // Redirect to display_users.php
        window.location.href = "display_users.php";
    }
</script>
    <footer>
    <a href="https://github.com/jundel-malazarte29" target="_blank" rel="noopener noreferrer">@malazarte</a>
    </footer>
</body>
</html>
