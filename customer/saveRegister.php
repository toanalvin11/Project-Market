<?php
require '../class/customer.php';
$thongbao = null;
if (isset($_POST['register'])) {
    if (empty($_POST['fullname']) || empty($_POST['passwd']) || empty($_POST['address']) || empty($_POST['city'])) 
    {
        $error = 'Vui lòng điền đầy đủ thông tin đăng ký';
    } else {
        $fullname = $_POST['fullname'];
        $passwd = $_POST['passwd'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        /** @var type $fullname */
        $cus = new customer(NULL, $passwd, $fullname, $address, $city);
        if(customer::add($cus) == 2) {
            echo "<script>alert('Tạo tài khoản thành công!');</script>";
        } else if(customer::add($cus) == 1){
            $thongbao = 'Tài khoản đã tồn tại!';
        } else {
            $thongbao = 'Đã có lỗi xảy ra!';
        }
    }
}
?>

