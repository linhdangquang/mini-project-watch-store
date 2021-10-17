<?php

session_start();
require_once './../../db/khach_hang.php';
$id = $_GET['id'];
$data = findUserById($id);
if ($data['ma_kh'] == $_SESSION['khach_hang']['ma_kh']) {
    $_SESSION['error'] = "Bạn không thể xóa chính mình";
    header("Location: ./users.php");
    die;
}else {
    deleteUser($id);
    header("Location: ./users.php");
}

?>