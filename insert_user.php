<?php

    session_start();
    if(!isset($_SESSION['AdminLoginId']))
    {
        header("Location: admin_login.php");
    }
?>
<?php
    require('admin_connection.php'); // Include the database connection

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        // $password = $_POST['password'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password

        // Check if email already exists
        $check_sql = "SELECT * FROM `users_registrations` WHERE `email` = ?";
        $check_stmt = $con->prepare($check_sql);
        $check_stmt->bind_param('s', $email);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();
        
        if ($check_result->num_rows > 0) {
            // Redirect back to add user page with error message if email already exists
            echo "<script>alert('This email is already registred');</script>";
            header('Location: add_user.php?error=email_exists');
            exit;
        }

        // Insert new user into the database
        $insert_sql = "INSERT INTO `users_registrations` (`first_name`, `last_name`, `phone`, `email`, `password`) VALUES (?, ?, ?, ?,?)";
        $insert_stmt = $con->prepare($insert_sql);
        $insert_stmt->bind_param('sssss', $first_name, $last_name, $phone, $email,$password);
        $insert_stmt->execute();
        $insert_stmt->close();
    }

    // Redirect back to manage users page after adding user
    header('Location: manage_users.php');
    exit;
?>
