<?php
session_start();

require_once './../../db/hang_hoa.php';
$data = [
    'ma_sp' => mb_strtoupper($_POST['ma_sp']),
    'ten_sp' => rtrim(mb_strtoupper($_POST['ten_sp'])),
    'so_luong' => $_POST['so_luong'],
    'gia' => $_POST['gia'],
    'don_vi' => $_POST['don_vi'],
    'mo_ta' => $_POST['mo_ta'],
    'ten_loai' => $_POST['ten_loai'],
    'dac_biet' => intval($_POST['dac_biet']),
];



if  (
    empty($_POST['ma_sp']) == true || empty($_POST['ten_sp']) == true || empty($_POST['so_luong']) == true || empty($_POST['gia']) == true || empty($_POST['don_vi']) == true || empty($_POST['mo_ta']) || empty($_POST['ten_loai']) == true || empty($data['dac_biet']) == true
) {
    $error = "Không được để trống!";

    $_SESSION['error'] = $error;
    header("Location: ./products.php");

    die;
    
}

if (
    $data['gia'] <0 || $data['so_luong'] <=-1
) {
    $error = "Thông số phải là số dương";

    $_SESSION['error'] = $error;
    header("Location: ./edit_products.php?id=" . $data['id']);

    die;
}


if (empty($_FILES['img']['name']) ==true) {
    $data['img'] = 'assets/img/no_image.png';
}elseif(!empty($_FILES['img'])) {
    $fileUpload = $_FILES['img'];

    // 1. check dinh dang file
    if (strpos($fileUpload['type'], 'image') === false) { 
        $error = " Không phải là ảnh!";
        $_SESSION['error'] = $error;
        header("Location: ./products.php");
        die;
    }

    //2. Kiểm tra dung lượng file
    if($fileUpload['size'] > 8000000) {
        $error = "File vượt quá dung lượng cho phép, phải nhỏ hơn 8mb!";
        $_SESSION['error'] = $error;
        header("Location: ./products.php");

        die;
    }

    // 3.Lưu trữ fileUpload
    $storePath = './../../../assets/img/';
    $fileName = $fileUpload['name'];
    $path = $storePath . $fileName;
    move_uploaded_file($fileUpload['tmp_name'], $path);

    $data['img'] = 'assets/img/' . $fileName;
}



$_SESSION['error'] = "<script>
        alert(\"Đã thêm thành công!\");
        </script>";
insertProduct($data);


header("Location: ./products.php");


