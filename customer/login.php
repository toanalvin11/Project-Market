<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <div class="container">
        <?php
            include "../customer/checkLogin.php";
        ?>
        <form action="./login.php" method="POST">
            <div class="form-group">
                <h2>Login</h2>
                <?php
                    if ($thongbao != null) {
                ?>
                <span style="color: red;"><?= $thongbao ?></span>
                 <?php 
                    } 
                 ?>
                 <br>
                <label>Your's ID:</label>
                <input type="text" class="form-control" name="nameid">
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" name="passwd">
            </div>
            <input type="submit" class="btn btn-primary" name="login" value="Login">
            <a href="register.php" class="btn btn-primary">Register</a>
        </form>
    </div>
</body>
</html>
