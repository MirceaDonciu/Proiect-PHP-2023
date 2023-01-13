<?php
    session_start();
    include "db_connect.php";

    if(isset($_POST['nume_film']) && isset($_POST['review']))
    {
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
    $nume = validate($_POST['nume_film']);
    $review = validate($_POST['review']);
    $data_curenta = date("Y-m-d H:i:s");

    if(empty($nume))
    {
        header("Location: scrie_review.php?error=Username is Required");
        exit();
    }
    else if(empty($review))
    {
        header("Location: scrie_review.php?error=Password is Required");
        exit();
    }
    $sql = "INSERT INTO recenzii (nume, timpul, continut) VALUES('$nume', '$data_curenta', '$review');";
    mysqli_query($conn, $sql);
    //am inserat in baza de date
    $sql = "SELECT * FROM recenzii WHERE timpul='$data_curenta';";
    $idul = mysqli_fetch_assoc(mysqli_query($conn, $sql))['id'];

    $phpul = '<?php session_start();?><html lang="ro"><head><meta name="keywords" content="reviews, movies, blog"><meta name="description" content="Revista Kurosawa"><title>Home</title><meta charset="utf-8"><meta name="author" content="Mircea Donciu"><link rel="stylesheet" type="text/css" href="style.css"></head><body><?php include "header.php"; ?><main><section><h1>';
    $phpul = $phpul.$nume.'</h1><p>'.$review.'</p></section></main></body></html>';

    $scrie = fopen("review$idul.php", "w");
    fwrite($scrie,$phpul);
    fclose($scrie);
    header("Location: recenzii.php");
    exit();
?>