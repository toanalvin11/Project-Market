<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/main.css">
    <title>DETAIL</title>
</head>
<body>
    <?php
    session_start();
    require '../class/order.php';
    require '../class/vegetable.php';
    $totalall = 0;
    ?>
    <div class="container">
        <?php
        if (!empty($_SESSION['iduser']) && isset($_GET['OrderID'])) {
        ?>
            <h3>Order Detail</h3>
            <table id="cart" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $detail = order::getOrderDetail($_GET['OrderID']);
                    if ($detail != null) {
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($detail)) {
                            $listveg = vegetable::getListByVegeID($row['VegetableID']);
                            $vegetable = mysqli_fetch_assoc($listveg);
                    ?>
                            <tr>
                                <td data-th="STT"><?= $i++ ?></td>
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-2 hidden-xs"><img src="../images/<?= $vegetable['Image'] ?>" 
                                        alt="Sản phẩm 1" class="img-responsive" width="100"></div>
                                    </div>
                                </td>
                                <td data-th="Quantity"><?= $vegetable['VegetableName'] ?>
                                </td>
                                <td data-th="Subtotal"><?= $row['Quantity'] ?></td>
                                <td class="actions" data-th="Price"><?= $total=$row['Price'] ?></td>
                                <?php $totalall+=$total;  ?>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
                <tfoot>
                <tr>
                    <td><a href="../cart/history.php" class="btn btn-warning"><i class="fa fa-angle-left"></i>Go back</a>
                    </td>
                    <td colspan="2" class="hidden-xs"> </td>
                    <td class="hidden-xs text-center"><strong>Tổng tiền : <?= $totalall ?> đ</strong>
                    </td>
                </tr>
            </tfoot>
            </table>
        <?php } else { ?>
            <h1>Bạn chưa được sử dụng chức năng này</h1>
            <a href="javascript:history.back()">Go back</a>
        <?php } ?>
    </div>
</body>
</html>

