<?php
$mysqli = new mysqli("localhost","root","","market");
if ($mysqli -> connect_errno) {
    echo "Kết nối database lỗi." . $mysqli -> connect_error;
    exit();
}
?>

