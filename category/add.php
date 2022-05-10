<?php
require '../class/category.php';

$thongbao = null;
if (isset($_POST['add'])) {
    if (!empty($_POST['name']) && !empty($_POST['des'])) {
        $cate = new category('NULL', $_POST['name'], $_POST['des']);
        if(category::add($cate)){
        }
    }
    else {
        $thongbao = 'Vui lòng điền đầy đủ thông tin!';
    }
} 
