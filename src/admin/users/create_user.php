<?php

session_start();

require_once './../../db/khach_hang.php';
$data = [
    'ma_kh' => $_POST['ma_kh'],
    'ten_kh' => $_POST['ten'],
    'sdt' => $_POST['sdt'],
    'dia_chi' => $_POST['dia_chi'],
    'gioi_tinh' => intval($_POST['gioi_tinh']),
    'email' => $_POST['email'],
    'mat_khau' => $_POST['mat_khau'],
    'vai_tro' => intval($_POST['vai_tro']),
];

$username = $data['ma_kh'];
$tel = $data['sdt'];
$email = $data['email'];

if (
    empty($data['ma_kh']) == true || empty($data['ten_kh']) == true || empty($data['sdt']) == true || empty($data['dia_chi'])
    ||  empty($data['email']) == true ||  empty($data['mat_khau']) == true
) {
    $error = "Không được để trống!";
    $_SESSION['error'] = $error;
    header("Location: ./users.php");
    die;
}

$userIfExist = checkUserExists($username,$tel,$email);
if ($userIfExist[0]['ma_kh'] == $data['ma_kh']) {
    $_SESSION['error'] = "Mã khách hàng đã tồn tại!";
    header("Location: ./users.php");
    die;
}elseif ($userIfExist[0]['sdt'] == $data['sdt']) {
    $_SESSION['error'] = "Số điện thoại đã tồn tại!";
    header("Location: ./users.php");
    die;
}
elseif ($userIfExist[0]['email'] == $data['email']) {
    $_SESSION['error'] = "Email đã tồn tại!";
    header("Location: ./users.php");
    die;
}

if ( strlen($data['mat_khau']) < 5) {
    $error = "Mật khẩu phải từ 5 ký tự!";
    $_SESSION['error'] = $error;
    header("Location: ./users.php");
    die;
}


insertUser($data);

header("Location: ./users.php");