<?php
session_start();
include "../vegetable/connection.php";
$thongbao = null;
if (isset($_POST['login'])) {
    if (!empty($_POST['nameid']) && !empty($_POST['passwd'])) {
        $nameid = $_POST['nameid'];
        $passwd = $_POST['passwd'];
        $querysql = mysqli_query($mysqli, "SELECT * FROM customers WHERE Password = '$passwd' 
        AND Fullname = '$nameid'");
        if (mysqli_num_rows($querysql) > 0) {
            $result = mysqli_fetch_assoc($querysql);
            $_SESSION['iduser'] = $result['CustomerID'];
            $_SESSION['username'] = $result['Fullname'];
            header('location:../vegetable/index.php');
            
        } else {
          $thongbao = 'Không tìm thấy tài khoản';
        }
    } else {
        $thongbao = 'Vui lòng điền đầy đủ thông tin';
    }
}
?>

