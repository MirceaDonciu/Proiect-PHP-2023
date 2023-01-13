<?php
session_start();
include "db_connect.php";

if(isset($_POST['username']) && isset($_POST['password']))
{
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$user = validate($_POST['username']);
$parola = validate($_POST['password']);
$imagine = $_FILES['loginimage'];

if(empty($user))
{
    header("Location: login.php?error=Username is Required");
    exit();
}
else if(empty($parola))
{
    header("Location: login.php?error=Password is Required");
    exit();
}
/*else if( (getimagesize($_FILES['loginimage']["tmp_name"]) == false) || ($_FILES['loginimage']["size"] > 500000))
{
    header("Location: login.php?errno=Image is Required");
    exit();
}*/

$sql = "SELECT * FROM users_imagini WHERE user_name='$user'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1)
{
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    $loginfile = "resurse/img_login/img$id.jpg";

    $cout = $_FILES["loginimage"]["tmp_name"];
    $cmp1 = md5(file_get_contents($_FILES["loginimage"]["tmp_name"]));
    $cmp2 = md5(file_get_contents($loginfile));

    if($row['user_name'] === $user && $row['password'] === $parola && $cmp1 == $cmp2)
    {

        if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM ultimii_useri"))==5)
        {
            mysqli_query($conn, "DELETE FROM ultimii_useri WHERE id=5");
            for($i=4; $i>=1; $i--)
            {
                $usi = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM ultimii_useri WHERE id = $i"))['user_id'];
                $j = $i + 1;
                mysqli_query($conn, "DELETE FROM ultimii_useri WHERE id=$i");
                mysqli_query($conn, "INSERT INTO ultimii_useri VALUES ($j, $usi)");
            }
            mysqli_query($conn, "INSERT INTO ultimii_useri VALUES (1, $id)");
        }
        else
        {
            $iid = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM ultimii_useri")) + 1;
            mysqli_query($conn, "INSERT INTO ultimii_useri VALUES ($iid, $id)");
        }

        $_SESSION['nume'] = $row['user_name'];
        $_SESSION['id'] = $row['id'];
        header("Location: index.php");
        exit();
    }
    else{
        header("Location: login.php?error=$cmp1 si $cmp2");
        exit();
    }
}
else {
    header("Location: login.php");
    exit();
}