<?php
    session_start();
    require_once './../../db/loai.php';
    $id = $_POST['id'];
    $data = [
        'id' => $id,
        'ten_loai' => $_POST['ten_loai'],
    ];
    if (empty($data['ten_loai'])){
        $_SESSION['error'] = "Không được để trống!";
        header("Location: ./edit_category.php?id=" . $data['id']); 
    }else {
        updateType($data);
        header("Location: ./category_page.php"); 
        $_SESSION['error'] = "<script>
        alert(\"Đã cập nhật thành công!\");
        </script>";
    }
?>