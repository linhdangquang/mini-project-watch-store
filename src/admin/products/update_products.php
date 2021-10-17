<?php

session_start();
require_once './../../db/hang_hoa.php';

$data = [
    'id' => $_POST['id'],
    'ma_sp' => mb_strtoupper($_POST['ma_sp']),
    'ten_sp' => mb_strtoupper($_POST['ten_sp']),
    'so_luong' => intval($_POST['so_luong']),
    'gia' => $_POST['gia'],
    'don_vi' => $_POST['don_vi'],
    'mo_ta' => $_POST['mo_ta'],
    'ten_loai' => $_POST['ten_loai'],
    'dac_biet' => intval($_POST['dac_biet']),
];



if  (
    empty($_POST['ma_sp']) == true || empty($_POST['ten_sp']) == true ||  empty($_POST['gia']) == true || empty($_POST['don_vi']) == true || empty($_POST['ten_loai']) == true || empty($data['dac_biet']) == true
) {
    $error = "Không được để trống!";

    $_SESSION['error'] = $error;
    header("Location: ./edit_products.php?id=" . $data['id']);

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

updateProduct($data);
$_SESSION['error'] = "<script>
        alert(\"Đã cập nhật thành công!\");
        </script>";
header("Location: ./products.php");

