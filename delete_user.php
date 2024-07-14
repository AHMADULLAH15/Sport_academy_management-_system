<?php

    session_start();
    if(!isset($_SESSION['AdminLoginId']))
    {
        header("Location: admin_login.php");
    }
?>
<?php
    require('admin_connection.php');

    if (isset($_GET['email'])) {
        $email = $_GET['email'];
        $sql = "DELETE FROM `users_registrations` WHERE `email` = '$email'";  // Note the single quotes around $email
        $con->query($sql);
    }
    header('Location: manage_users.php');  // Remove the space after Location
    exit;
?>
<!-- <?php 
    // require('admin_connection.php');

    // if (isset($_GET['email'])) {
    //     $email = $_GET['email'];

        // Use prepared statements to prevent SQL injection
        // $stmt = $con->prepare("DELETE FROM `users_registrations` WHERE `email` = ?");
        // $stmt->bind_param('s', $email);
        // $stmt->execute();
        // $stmt->close();
    // }

    // header('Location: manage_users.php');
    // exit;
// ?>
