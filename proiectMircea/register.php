<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php include "header.php"; ?>
    <h2>REGISTER</h2>
    <section class="loginbody">
    <form action="register2.php" method="post" enctype="multipart/form-data">
        <?php if(isset($_GET['error'])) { ?>
            <p class="error"> <?php echo $_GET['error']; ?> </p>
        <?php } ?>
        <label>Username</label>
        <input type="text" name="rgusername" placeholder="User Name"><br>
        <label>Password</label>
        <input type="password" name="rgpassword" placeholder="Password"><br>

        <input type="file" name="rgimage"><br>

        <button type="submit">Sign Up!</button>
    </form>
    </section>
</body>
</html>