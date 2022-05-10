<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HISTORY</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <?php
    session_start();
    require '../class/order.php';
    if (!empty($_SESSION['iduser'])) {
        $id = $_SESSION['iduser'];
    ?>
        <div class="container">
            <h3>History</h3>
            <table id="cart" class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <?php
                $history = order::getAllOrder($id);
                if ($history != null) {
                    $stt = 1;
                    while ($row = mysqli_fetch_assoc($history)) {
                ?>
                        <tbody>
                            <tr>
                                <td data-th="STT"><?= $stt++ ?></td>
                                <td data-th="Price"><?= $row['Date'] ?></td>
                                <td data-th="Subtotal"><?= $row['Total'] ?> đ</td>
                                <td class="actions" data-th="">
                                    <a href="./detail.php?OrderID=<?= $row['OrderID'] ?>" 
                                    class="btn btn-info btn-sm"><i class="fa fa-edit">Detail</i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                <?php }
                } ?>
            </table>
        </div>
    <?php } else { ?>
        <h1>Bạn chưa đăng nhập để sử dụng chức năng này</h1>
        <a href="../cart/history.php">Quay lại</a>
    <?php } ?>
</body>
</html>

