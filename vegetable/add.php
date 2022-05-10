<?php
include '../vegetable/connection.php';
$thongbao = null;
if (isset($_POST['AddVege'])) {
    if (!empty($_POST['NameVege']) && !empty($_POST['Unit']) && !empty($_POST['Amount']) && !empty($_POST['NameCate']) && !empty($_POST['Price'])) {
        if (isset($_FILES["image"])) {
            
            $namevege = $_POST['NameVege'];
            $unit = $_POST['Unit'];
            $amount = $_POST['Amount'];
            $namecate = $_POST['NameCate'];
            $price = $_POST['Price'];

            $target_dir = "../images/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $file_name = $_FILES["image"]["name"];
            $checkupload = 1;

            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            // Kiểm tra file upload lên có phải là ảnh không ?
            $checkfile = getimagesize($_FILES["image"]["tmp_name"]);

            if ($checkfile !== false) {
                $checkupload = 1;
            } else {
                $thongbao = "File không phải là hình ảnh ! Vui lòng chọn file khác.";
                $checkupload = 0;
            }
            // Kiểm tra file có tồn tại hay chưa
            if (file_exists($target_file)) {
                $thongbao = "Xin lỗi ! File đã tồn tại, Vui lòng chọn file khác !";
                $checkupload = 0;
            }
            // Kiểm tra file có vượt quá 2mb hay không
            if ($_FILES["image"]["size"] > 2621440) {
                $thongbao = "File tối đa 2mb.";
                $checkupload = 0;
            }
            // Kiểm tra ảnh định dạng có hợp lệ hay không
            if ($imageFileType != "jpg" && $imageFileType != "png") 
            {
                $thongbao = "Chỉ nhận những file có đuôi .PNG, .JPG ";
                $checkupload = 0;
            }
            // Kiểm tra điều kiện
            if ($checkupload == 0) {
                $thongbao = "Upload file thất bại ! Vui lòng thử lại";
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $queryuploadfile = mysqli_query($mysqli, "INSERT INTO vegetable VALUES ('NULL','$namecate','$namevege',
                    '$unit','$amount','$file_name','$price')");
                    if (!$queryuploadfile) {
                        $thongbao = 'Upload file không thành công! Vui lòng thử lại';
                    } else {
                        echo "<script>alert('Tạo sản phẩm thành công!');</script>";
                    }
                } else {
                    $thongbao = "Đã có lỗi xảy ra. Vui lòng thử lại";
                }
            }
        } else {
            $thongbao = "Hãy chọn 1 ảnh";
        }
    } else {
        $thongbao = 'Vui lòng điền đầy đủ thông tin !';
    }
}
