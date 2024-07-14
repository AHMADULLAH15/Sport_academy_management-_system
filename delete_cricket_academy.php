<?php
    require('admin_connection.php');

    if (isset($_GET['academy_email'])) {
        $email = $_GET['academy_email'];
        $sql = "DELETE FROM `cricket_academy_list_ctg` WHERE `academy_email` = '$email'";  // Note the single quotes around $email
        $con->query($sql);
    }
    header('Location: manage_cricket_academy.php');  // Remove the space after Location
    exit;
?>