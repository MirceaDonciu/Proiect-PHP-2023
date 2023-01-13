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
        <div id="container">
            <section id="welcome">
                <h2>Salut<?php if(isset($_SESSION['nume'])) {$nume_temp=$_SESSION['nume']; echo " $nume_temp";} ?>!!!</h2>
                <p><em>Aceasta este Revista de filme "Kurosawa" scrisa de mine, Mircea Donciu. Aici imi dau eu cu parerea despre filme. Pentru a-mi vedea recenziile dati click pe "Recenzii" dupa ce v-ati creat un cont.</em></p>
            </section>
            <section id="scene">
                <h3>Scene bune din filmele mele favorite:</h3>
                <ul id="tab-iframe-scene">
                    <li><a href="https://www.youtube.com/embed/W8h_HZwTp2k" target="ifr-scena">"Nasul"</a></li>
                    <li><a href="https://www.youtube.com/embed/ur1Kqs4IWew" target="ifr-scena">"Deer Hunter"</a></li>
                    <li><a href="https://www.youtube.com/embed/i1QyaKs6E5w" target="ifr-scena">"Amadeus"</a></li>
                </ul>
                <div allign="center"><iframe name="ifr-scena"
                    width="560" height="315" src="https://www.youtube.com/embed/W8h_HZwTp2k" 
                    title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe></div>
            </section>
            <section id="statistici">
                <h3>Numarul Total de hituri pe pagina principala:<?php 
                    $filecount = fopen("resurse/nr_users.txt", "r");
                    $nr = (int)fread($filecount,filesize("resurse/nr_users.txt"));
                    $nr += 1;
                    echo $nr;
                    fclose($filecount);
                    $filecount = fopen("resurse/nr_users.txt", "w");
                    fwrite($filecount,$nr);
                    fclose($filecount);
                ?></h3>
                <h3>Numarul Total de useri:<?php
                    include "db_connect.php";
                    $sql = "SELECT * FROM users_imagini";
                    $result = mysqli_query($conn, $sql);
                    echo mysqli_num_rows($result);
                    /*close($conn);*/
                ?></h3>
            </section>
            <section id="users">
                <h3>Ultimii 5 utilizatori care s-au logat:</h3>
                <?php
                    $sql = "SELECT * FROM ultimii_useri";
                    $result = mysqli_query($conn, $sql);
                    for($i=1; $i<=mysqli_num_rows($result); $i++)
                    {?>
                        <h4><?php 
                            $sql = "SELECT * FROM ultimii_useri WHERE id=$i";
                            $result2 = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $id = $row['user_id'];
                            $sql = "SELECT * FROM users_imagini WHERE id=$id";
                            $result2 = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result2);
                            echo $i.") ".$row['user_name'];
                        ?></h4>
                    <?php }
                ?>
            </section>
            <section id="info">
                <h3>Informatii site si server:</h3>
                <p>Acesta este un site facut pentru proiectul de php</p>
            </section>
        </div>
        </main>
        <footer>
            <div id="copyright">
                <p><small>Copyright &copy;2023</small></p>
                <p><small>Donciu Mircea</small></p>
            </div>
            <p><small><time datetime="2023-01-10"> Modificat la 20 JAN 2023</datetime></small></p>
            </div>
        </footer>
    </body>
</html>