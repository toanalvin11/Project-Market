<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/main.css">
    <title>MARKET</title>
</head>
<body>
    <div class="container">
        <?php
            include "./menu.php";
            include "../class/vegetable.php";
            include "../class/category.php";
            include "./connection.php";
        ?>
        <div class="container_product">
            <div class="row">
                <div class="col-md-3">
                    <?php 
                    $category = category::getAll();
                    if ($category != null) {
                    ?>
                        <form action="./index.php" method="POST">
                            <div class="menuleft">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5><strong>Category Name: </strong></h5>
                                    </div>
                                </div>
                                <?php
                                while ($rows = mysqli_fetch_assoc($category)) {
                                ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="checkbox" name="category[<?= $rows['CategoryID'] ?>]" id="" 
                                            value="<?= $rows['CategoryID'] ?>">
                                            <span><?= $rows['Name'] ?></span>
                                        </div>
                                    </div>
                                <?php } ?>
                                <input type="submit" value="Filter" class="btn btn-primary">
                            </div>
                        </form>
                    <?php } else { ?>
                        <h4 style="color: red;">Dữ liệu category lỗi !</h4>
                    <?php } ?>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Vegetable</h2>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        if (isset($_POST['category'])) {
                            $product = vegetable::getListByCateIDs($_POST['category']);
                        } else {
                            $product = vegetable::getAll();
                        }
                        if ($product != null) {
                            while ($row = mysqli_fetch_assoc($product)) {
                        ?>
                                <div class="col-md-4">
                                    <div class="card border-0">
                                        <img src="..\images\<?= $row['Image'] ?>" class="card-img-top" style="height: 180px;"/>
                                        <span class="card-body">
                                            <h5 class="card-title"><?= $row['VegetableName'] ?> 
                                                <span class="badge bg-warning text-white"><?= $row['Price'] ?>đ</span>
                                            </h5>
                                            <a href="../cart/index.php?action=add&sanpham=<?= $row['VegetableID'] ?>" 
                                            class="btn btn-danger">Buy</a>
                                        </span>
                                    </div>
                                </div>
                            <?php }
                        } else { ?>
                            <h2 style="color: red;">Không có sản phẩm.</h2>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
