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
        $email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone = $_POST['phone'];

        // Update user details in the database
        $sql = "UPDATE `users_registrations` SET `first_name`=?, `last_name`=?, `phone`=? WHERE `email`=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('ssss', $first_name, $last_name, $phone, $email);
        $stmt->execute();
        $stmt->close();
    }

    // Redirect back to manage users page after updating user
    header('Location: manage_users.php');
    exit;
?>
