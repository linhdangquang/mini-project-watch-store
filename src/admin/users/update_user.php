<?php

session_start();
require_once './../../db/khach_hang.php';
$data = [
    'id' => $_POST['id'],
    'ma_kh' => $_POST['ma_kh'],
    'ten' => $_POST['ten_kh'],
    'sdt' => $_POST['sdt'],
    'dia_chi' => $_POST['dia_chi'],
    'gioi_tinh' => $_POST['gioi_tinh'],
    'email' => $_POST['email'],
    'mat_khau' => $_POST['mat_khau'],
    'vai_tro' => intval($_POST['vai_tro']),
];

if (
    empty($data['ma_kh']) == true || empty($data['ten']) == true || empty($data['sdt']) == true || empty($data['dia_chi'])
    ||  empty($data['email']) == true ||  empty($data['mat_khau']) == true 
) {
    $error = "Không được để trống!";
    $_SESSION['error'] = $error;
    if (isset($_POST['profile'])) {
        header("Location: ./../../../profile.php?id=" . $data['id']);
        die;
    }else {
        header("Location: ./edit_user.php?id=" . $data['id']);
        die;
    }
}

if ( strlen($data['mat_khau']) < 5) {
    $error = "Mật khẩu phải từ 5 ký tự!";
    $_SESSION['error'] = $error;
    header("Location: ./edit_user.php?id=" . $data['id']);
    die;
}

$_SESSION['error'] = "Đã cập nhật hồ sơ!";
updateUser($data);
if (isset($_POST['profile'])) {
    $_SESSION['khach_hang'] = $data;
    header("Location: ./../../../profile.php?id=" . $data['id']);
    die;
}else {
    header("Location: ./users.php");
}


