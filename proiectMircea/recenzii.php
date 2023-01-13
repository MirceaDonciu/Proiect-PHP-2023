<?php
    session_start();
?>
<html lang="ro">
    <head>
        <meta name="keywords" content="reviews, movies, blog">
        <meta name="description" content="Revista Kurosawa">
        <title>Home</title>
        <meta charset="utf-8">
        <meta name="author" content="Mircea Donciu">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php include "header.php"; ?>
        <main>
        <section>
            <?php 
            if(isset($_SESSION['id'])){
            if($_SESSION['id']==1)
            {?>
                <form action="scrie_review.php" method="post">
                    <button type="submit">Adauga Review</button>
                </form>
            <?php }
            }?>
            <h3>Lista de Recenzii:</h3>
            <?php
                include "db_connect.php";
                $reviewuri = mysqli_query($conn, "SELECT * FROM recenzii;");
                $x =  mysqli_fetch_assoc($reviewuri);
                while($x)
                {
                    $idul = $x["id"];
                    $nume_link = "review$idul.php";
                    ?>
                    <a href=<?php echo $nume_link; ?>><?php echo $x["nume"]; ?></a><br>
                    <?php 
                    $x =  mysqli_fetch_assoc($reviewuri);
                }
            ?>
        </section>
        </main>
    </body>
</html>