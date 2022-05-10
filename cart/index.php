<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <?php
    session_start();
    include '../vegetable/connection.php';
    
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    if (isset($_GET['action'])) {
        function update_cart($add = false)
        {
            $id = $_GET['sanpham'];
            if ($add) {
                if (!empty($_SESSION['cart'][$id])) {
                    $_SESSION['cart'][$id] += 1;
                } else {
                    $_SESSION['cart'][$id] = 1;
                }
            }
        }
        switch ($_GET["action"]) {
            case "add":
                update_cart(true);
                header('location: ./index.php');
                break;
            case "delete":
                if (isset($_GET['id'])) {
                    unset($_SESSION['cart'][$_GET['id']]);
                }
                header('location: ./index.php');
                break;
            case "submit":
                include './saveorder.php';
                break;
        }
    }
    if (!empty($_SESSION["cart"])) {
        $product = mysqli_query($mysqli, "SELECT * FROM vegetable WHERE VegetableID IN (" . implode(",", array_keys($_SESSION["cart"])) . ")");
    } else {
        $product = null;
    } ?>
    <div class="container">
        <form action="?action=submit" method="POST">
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                    <h3>Cart</h3>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th class="text-center">Picture</th>
                        <th>Price</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <?php
                if ($product != null) {
                    $totalall = 0;
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($product)) {
                ?>
                        <tbody>
                           
                            <tr>
                                <td data-th="STT"><?= $i++ ?></td>
                                <td data-th="Product">
                                    <div class="row">
                                        <h4 class="nomargin"><?= $row['VegetableName'] ?></h4>
                                    </div>
                                </td>
                                <td data-th="Image">
                                    <div class="col-sm-10">
                                        <div class="col-sm-2 hidden-xs"><img src="../images/<?= $row['Image'] ?>" class="img-responsive" width="200"></div>
                                    </div>
                                </td>
                                <td data-th="Price"><?= $row['Price'] ?> Đ</td>
                                <td data-th="Subtotal" class="text-center"><span><?= $_SESSION['cart'][$row['VegetableID']] ?></span></td>
                                <?php
                                $total = $row['Price'] * $_SESSION['cart'][$row['VegetableID']];
                                $totalall += $total;
                                ?>
                                <td data-th="Quantity" class="text-center"><span><?= $total ?> Đ</span>
                                </td>
                                <td class="actions" data-th="">
                                    <a class="btn btn-danger btn-sm" href="./index.php?action=delete&id=<?= $row['VegetableID'] ?>">
                                    <i class="fa fa-trash-o">Xóa</i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    <?php } ?>
                    <tfoot>
                        <tr>
                            <td><a href="../vegetable/index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Go back</a>
                            </td>
                            <td colspan="2" class="hidden-xs"> </td>
                            <td class="hidden-xs text-center"><strong>Total Price <?= $totalall ?> Đ</strong>
                            </td>
                            <td><input type="submit" name="click" value="Order" class="btn btn-success btn-block" /><i class="fa fa-angle-right"></i>
                            </td>
                        </tr>
                    </tfoot>
            </table>
            <div id="thongtin" style="text-align: end;">
                <hr>
                <?php if (!empty($error)) { ?>
                    <p style="color: red;margin-right: 20px;">*<?= $error ?></p>
                <?php } ?>
                <div style="margin: 20px;"><label>Note: </label> <textarea name="Notes" cols="100" rows="7"></textarea></div>
            </div>
        <?php } else { ?>
            <tfoot>
                <tr>
                    <td><a href="../vegetable/index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i>Go back</a>
                    </td>
                    <td colspan="2" class="hidden-xs"> </td>
                    <td class="hidden-xs text-center"><strong>Tổng tiền 0 đ</strong>
                    </td>
                </tr>
            </tfoot>
        <?php } ?>
        </table>
        </form>
    </div>
</body>
</html>