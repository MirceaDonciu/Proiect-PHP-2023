<?php
    $dbname = "localhost";
    $dbuser = "root";
    $dbpassword = "";

    $db_name = "login_imagini";

    $conn = mysqli_connect($dbname, $dbuser, $dbpassword, $db_name);
    if(!$conn)
    {
        echo "Connection Failed";
    }
?>