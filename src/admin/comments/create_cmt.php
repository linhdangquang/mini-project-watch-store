<?php 
    session_start();
    require_once './../../db/binh_luan.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $data = [
        'noi_dung' => $_POST['noi_dung'],
        'ma_sp' => $_POST['ma_sp'],
        'ma_kh' => $_POST['ma_kh'],
    ];
    $data['ngay_bl'] = date('Y-m-d H:i:s');
    if (empty($data['noi_dung'])  == true) {
        $_SESSION['error'] = "Không được để trống";
        header("Location: ./../../../product_page.php?id=" . $data['ma_sp']);
        die;
    }

    insertComment($data);
    $_SESSION['error'] = "Đã bình luận";
    header("Location: ./../../../product_page.php?id=" . $data['ma_sp'] . "#comment__container");


?>