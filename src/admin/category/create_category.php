<?php
    session_start();
    require_once './../../db/loai.php';
    $id = $_POST['ten_loai'];
    $kq = loai_exists($id);
    $data = [
        'ten_loai' => $_POST['ten_loai'],
    ];
    if (empty($data['ten_loai'])){
        $_SESSION['error'] = "Không được để trống!";
        header("Location: ./category_page.php"); 
    }else if($kq == true) {
        $_SESSION['error'] = "Loại hàng đã tồn tại!";
        header("Location: ./category_page.php");
        die;
    } else {
        insertType($data);
        header("Location: ./category_page.php"); 
        $_SESSION['error'] = "<script>
        alert(\"Đã thêm thành công!\");
        </script>";
    }

?>