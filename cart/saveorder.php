<?php
if (isset($_SESSION['iduser'])) {
    if (isset($_POST['click'])) {
        if (!empty($_SESSION['cart'])) {
            $product = mysqli_query($mysqli, "SELECT * FROM vegetable WHERE VegetableID 
            IN (" . implode(",", array_keys($_SESSION["cart"])) . ")");
            $total = 0;
            $orderProducts = array();
            while ($rows = mysqli_fetch_array($product)) {
                $orderProducts[] = $rows;
                $total += $rows['Price'] * $_SESSION['cart'][$rows['VegetableID']];
            }
            $insert = mysqli_query($mysqli, "INSERT INTO 
            `orders` (`OrderID`, `CustomerID`, `Date`, `Total`, `Note`) 
            VALUES (NULL,'" . $_SESSION['iduser'] . "', '" . date("Y-m-d") . "', '" . $total . "', 
            '".$_POST['Notes']."')");
            $idorder = $mysqli->insert_id;
            $String = "";  
            foreach ($orderProducts as $keys => $product) {
                $totalproduct = $product['Price'] * $_SESSION['cart'][$product['VegetableID']];
                $String .= "('" . $idorder . "', '" . $product['VegetableID'] . "', 
                '" . $_SESSION['cart'][$product['VegetableID']] . "', '" . $totalproduct . "')";
                if ($keys != count($orderProducts) - 1) {
                    $String .= ",";
                }
            }
            $insertOrderdetail = mysqli_query($mysqli, "INSERT INTO `orderdetail` (`OrderID`, `VegetableID`, `Quantity`, 
            `Price`) VALUES " . $String . "");
            if ($insertOrderdetail) {
                unset($_SESSION['cart']);
                echo "<h1><script>alert('Thanh toán thành công');</script></h1><a href='../vegetable/index.php'>Trang chủ</a>";
            } else {
                echo "<script>alert('Thanh toán thất bại');</script>";
            }
        }
    }
} else {
    echo "<h1>Xin đăng nhập trước khi thanh toán. </h1><a href='../customer/login.php'>Đăng nhập</a>";
    exit;
}
?>

