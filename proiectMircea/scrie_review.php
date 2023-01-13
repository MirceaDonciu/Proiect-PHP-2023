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
            <form action="upload_review.php" method="post">
                <label>Nume film:</label><br>
                <input type="text" name="nume_film" placeholder="Numele Filmului"><br>
                <label>Review-ul:</label><br>
                <textarea id="recenzie_text" name="review" rows="15" cols="150">
                </textarea><br>
                <button type="submit">Adauga!!!</button>
            </form>
        </section>
        </main>
    </body>
</html>