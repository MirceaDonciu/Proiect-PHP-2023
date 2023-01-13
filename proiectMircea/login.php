<html>
<head>
    <title>Login cu Imagine</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php include "header.php"; ?>
    <h2>LOGIN</h2>
    <section class="loginbody">
    <form action="login1.php" method="post" enctype="multipart/form-data">
        <?php if(isset($_GET['error'])) { ?>
            <p class="error"> <?php echo $_GET['error']; ?> </p>
        <?php } ?>
        <label>Username</label>
        <input type="text" name="username" placeholder="User Name"><br>
        <label>Password</label>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="file" name="loginimage"><br>

        <button type="submit">Login</button>
    </form>
    <form action="register.php" method="post">
        <button type="submit">Register</button>
    </form>
    </section>
</body>
</html>