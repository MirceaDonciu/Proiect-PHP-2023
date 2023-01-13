<header>
            <section id="start">
                <h1>Revista Kurosawa</h1>
            </section>
            <nav id="navi">
                <ul class="meniu">
                    <li class="butonmeniu"><div><a href="index.php"><span class="fas fa-home"></span><span id="casatext">Acasa</span></a></div>
                        <ul class="submeniu">
                            <li><a href="#welcome">Welcome!!!</a></li>
                            <li><a href="#scene">Scene</a></li>
                            <li><a href="#statistici">Statistici</a></li>
                        </ul>
                    </li>
                    <?php if (!isset($_SESSION['nume'])) {?>
                        <li class="butonmeniu"><a href="login.php" class="nucade">Recenzii</a></li>
                        <li class="butonmeniu"><a href="login.php" class="nucade">Log In/Sign Up</a></li>
                    <?php } else { ?>
                        <li class="butonmeniu"><a href="recenzii.php" class="nucade">Recenzii</a></li>
                        <li class="butonmeniu"><a href="logout.php" class="nucade">Logout</a></li>
                    <?php } ?>
                    <li class="butonmeniu"><a href="./produse" class="nucade">Contact</a></li>
                </ul>
            </nav>
        </header>