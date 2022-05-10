<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <?php 
    session_start();
    ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="./index.php">Market online</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./index.php">Vegetable</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../cart/index.php">Cart</a>
                </li>
                <?php
                if (!isset($_SESSION['iduser']) && !isset($_SESSION['username'])) {

                ?>
                    <a class="btn btn-primary " type="submit" href="../customer/login.php">Login</a>
                <?php
                } else {
                ?>
                    <a class="nav-link" href="../cart/history.php">History</a>
                    <a class="nav-link" href="../customer/logout.php">Logout</a>
                    <a class="btn btn-primary " type="submit" href="#"><?= $_SESSION['username'] ?></a>
                <?php } ?>
                </ul>
                
            </div>
        </nav>
</body>
</html>