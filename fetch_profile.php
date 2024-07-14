<?php
session_start();
header('Content-Type: application/json');

if (isset($_SESSION['UserProfileData'])) {
    echo json_encode($_SESSION['UserProfileData']);
} else {
    echo json_encode(array('error' => 'User not logged in'));
}
?>
