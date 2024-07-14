<?php
require('admin_connection.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $academy_email = $_POST['academy_email'];

    $academy_name = $_POST['academy_name'];
    $academy_address = $_POST['academy_address'];
    $academy_phone = $_POST['academy_phone'];
    $registration_fee = $_POST['registration_fee'];
    $monthly_fee = $_POST['monthly_fee'];
    $venue = $_POST['venue'];
    $coach = $_POST['coach'];

    $sql = "UPDATE `football_academy_list_ctg`
            SET `academy_name`=?, `academy_address`=?, `academy_phone`=?, `registration_fee`=?, `monthly_fee`=?, 
                `venue`=?, `coach`=?
            WHERE `academy_email` = ?";

    $stmt = $con->prepare($sql);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($con->error));
    }

    $bind = $stmt->bind_param('ssssssss', $academy_name, $academy_address, $academy_phone, $registration_fee, $monthly_fee, $venue, $coach, $academy_email);
    if ($bind === false) {
        die('Bind param failed: ' . htmlspecialchars($stmt->error));
    }

    $exec = $stmt->execute();
    if ($exec === false) {
        die('Execute failed: ' . htmlspecialchars($stmt->error));
    }

    $stmt->close();
    $con->close();
    header('Location: manage_football_academy.php');
    exit;
}
?>
