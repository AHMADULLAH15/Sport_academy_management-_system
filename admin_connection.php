<?php

    $con = mysqli_connect("localhost","root"," ","sports_academy");

    if(mysqli_connect_error())
    {
        // echo "Failed to connect";
        echo "<script>alert('Faild to connect database');</script>";
        exit();
    }
?>