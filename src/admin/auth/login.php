<?php

session_start();

require_once './../../db/khach_hang.php';
require_once './recaptcha.php';

$username = $_POST['ma_kh'];
$password = $_POST['password'];
if (empty($username) || empty($password)) {
    $_SESSION['error'] = "Không được để trống";
    header("Location: ./login_form.php");
    die;
}

$user = loginUser($username, $password);
if(empty($user == true)) {
    $error = "Tài khoản hoặc mật khẩu không đúng";
    $_SESSION['error'] = $error;
    header("Location: ./login_form.php");
    die;
}
$recaptcha = $_POST['g-recaptcha-response'];
$res = reCaptcha($recaptcha);
if(!$res['success']){
    $_SESSION['error'] = "Captcha Require!";
    header("Location: ./login_form.php");
    die;
  }
$_SESSION['start'] = time();
$_SESSION['expire'] = $_SESSION['start'] + (60   * 60 );
$_SESSION['khach_hang'] = $user;

header("Location: ./../../../index.php");