<?php
<<<<<<< HEAD
include "db_connect.php";

$error_msg = "";

if (isset($_POST['submit'])) {
    $user_ID = $_POST['user_ID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $created_at = $_POST['created_at'];

    // Check for duplicate ID
    $check_sql = "SELECT * FROM `users` WHERE user_id = '$user_ID'";
    $check_result = mysqli_query($conn, $check_sql);
=======
    include "db_connect.php";
    
    $error_msg = "";

    if (isset($_POST['submit'])) {
        $user_ID = $_POST['user_ID'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $created_at = $_POST['created_at'];
    }

    // Check for duplicate ID
    $check_sql = "SELECT * FROM `users` WHERE id = $user_ID";
    $check_result = mysqli_query($check_sql);
>>>>>>> 41f3175f2ad80c81e1fe86c232b62c64bae46151

    if (mysqli_num_rows($check_result) > 0) {
        $error_msg = "Error: Duplicate Employee ID. This ID already exists.";
    } else {
        $sql = "INSERT INTO `users` (`user_id`, `name`, `email`, `message`, `created_at`) 
        VALUES ('$user_ID', '$name', '$email', '$message', '$created_at')";

<<<<<<< HEAD
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: display_users.php?msg=Successfully added!");
            exit();
        } else {
            $error_msg = "Failed: " . mysqli_error($conn);
        }
    }
}
=======
        $result = mysqli_query($check_result);

        if ($result) {
            header("Location: \display_users.php?msg=Successfully added!");
        } else {
            $error_msg = "Failed: " . mysqli_error($conn);
         }
    }
>>>>>>> 41f3175f2ad80c81e1fe86c232b62c64bae46151
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Users</title>
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./css/display.css">
</head>
<<<<<<< HEAD
<body>
    <!-- message alert -->
    <div class="container">
        <?php 
        if (isset($_GET["msg"])) {
            $msg = $_GET["msg"];
            echo '<div class="alert">' . $msg . ' 
=======
    <body>
    <!-- message alert -->
    <div class="container">
        <?php 
        if(isset($_GET["msg"])) {
            $msg = $_GET["msg"];
            echo '<div class="alert">
            ' . $msg . ' 
>>>>>>> 41f3175f2ad80c81e1fe86c232b62c64bae46151
                <button type="button" class="close-btn">&times;</button>
            </div>';
        }
        ?>

<<<<<<< HEAD
        <div id="table-container">
            <table class="table">
=======
        <div class="table-container">
            <table class="Table">
>>>>>>> 41f3175f2ad80c81e1fe86c232b62c64bae46151
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Created At</th>
<<<<<<< HEAD
                        <th>Action</th>
=======
                        <<th>Action</th>
>>>>>>> 41f3175f2ad80c81e1fe86c232b62c64bae46151
                    </tr>
                </thead>
                <tbody>
                <?php 
<<<<<<< HEAD
                    // Retrieve the records to display in the table
                    $sql = "SELECT * FROM users";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['user_ID']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['message']; ?></td>
                                <td><?php echo $row['created_at']; ?></td>
                                <td>
                                    <div class="action-button">
                                        <!-- Edit Button -->
                                        <form action="update.php" method="get" style="display: inline;">
                                            <input type="hidden" name="id" value="<?php echo $row['user_ID']; ?>">
                                            <button type="submit" class="btn-edit" id="edit-btn">Edit</button>
                                        </form>

                                        <!-- Delete Button -->
                                        <form action="delete.php" method="post" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            <input type="hidden" name="id" value="<?php echo $row['user_ID']; ?>">
                                            <button type="submit" class="btn btn-delete" id="delete-btn">
                                                <i class="fa-solid fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        echo "<tr><td colspan='6'>No records found</td></tr>";
                    }
                ?>
                </tbody>
            </table>
=======
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['user_ID']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['message']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                                <td>
                                <a href="delete.php?id=<?php echo $row["user_ID"]; ?>" class="action-link"><i class="fa-solid fa-trash"></i>Delete</a> 
                                </td>
                        </tr>
                </tbody>

            </table>

>>>>>>> 41f3175f2ad80c81e1fe86c232b62c64bae46151
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // add event listener to all close buttons
            const closeButtons = document.querySelectorAll(".close-btn");
            closeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const alertBox = this.parentElement;
                    alertBox.style.display = "none";
                });
            });
        });
<<<<<<< HEAD
        </script>
    </div>
</body>
</html>
=======
    </script>
    
    </body>
</html>
>>>>>>> 41f3175f2ad80c81e1fe86c232b62c64bae46151
