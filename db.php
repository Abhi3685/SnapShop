<?php
    $conn = mysqli_connect('sql207.epizy.com','epiz_23229096','HST06jeft8','epiz_23229096_sshop');
    if(!$conn){
        echo "Database Connection Failed.";
    }
    date_default_timezone_set("Asia/Kolkata");
?>