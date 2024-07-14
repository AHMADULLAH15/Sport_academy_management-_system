<?php
$name = "<script>alert('XSS');</script>";
echo "User Name: " . htmlspecialchars($name); // This would display the script tags as plain text
?>
