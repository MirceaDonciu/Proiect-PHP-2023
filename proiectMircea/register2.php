<?php
session_start();
include "db_connect.php";

if(isset($_POST['rgusername']) && isset($_POST['rgpassword']))
{
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$rguser = validate($_POST['rgusername']);
$rgparola = validate($_POST['rgpassword']);
$rgimagine = $_FILES['rgimage'];

if(empty($rguser))
{
    header("Location: register.php?error=Username is Required");
    exit();
}
else if(empty($rgparola))
{
    header("Location: register.php?error=Password is Required");
    exit();
}
else if( (getimagesize($_FILES['rgimage']["tmp_name"]) == false) || ($_FILES['rgimage']["size"] > 500000))
{
    header("Location: register.php?error=Image is Required");
    exit();
}

$sql1 = "SELECT * FROM users_imagini WHERE user_name='$rguser'";

$result1 = mysqli_query($conn, $sql1);

if(mysqli_num_rows($result1) === 0)
{
    
    $sql2 = "INSERT INTO users_imagini (user_name, password) VALUES ('$rguser', '$rgparola');";
    if ($conn->query($sql2) === TRUE)
    {
        $sql1 = "SELECT * FROM users_imagini WHERE user_name='$rguser'";
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($result1);
        $id1 = $row1['id'];

        $target_dir = "resurse/img_login/";
        $imgType = strtolower(pathinfo($_FILES['rgimage']["tmp_name"],PATHINFO_EXTENSION));
        $target_file = $target_dir."img$id1.jpg";
        move_uploaded_file($_FILES['rgimage']["tmp_name"], $target_file);
        header("Location: login.php?Inregistrare cu Succes!");
    }
    else{
        header("Location: login.php?Failure to register");
    }
}
else {
    header("Location: register.php?Username already exists");
    exit();
}