<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <div class="container">
        <?php
            include "../customer/saveRegister.php";
        ?>
        <form action="./register.php" method="POST">
            <div class="form-group">
                <h3>Register</h3>
                <?php
                    if ($thongbao != null) {
                ?>
                <span style="color: red;"><?= $thongbao ?></span>
                 <?php 
                    } 
                 ?>
                 <br>
                <label>Your's Fullname:</label>
                <input type="text" class="form-control" name="fullname">
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" name="passwd">
            </div>
            <div class="form-group">
                <label>Address:</label>
                <input type="text" class="form-control" name="address">
            </div>
            <div class="form-group">
                <label>City:</label>
                <input type="text" class="form-control" name="city">
            </div>
            <td><a href="../customer/login.php" class="btn btn-warning"><i class="fa fa-angle-left"></i>Go back</a>
            <input type="submit" class="btn btn-primary" name="register" value="Register">
            
        </form>
    </div>
</body>
</html>
