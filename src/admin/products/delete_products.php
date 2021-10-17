<?php
session_start();
require_once './../../db/hang_hoa.php';

if (isset($_POST['multi_delete'])) {
        $id = $_POST['check'];
        deleteProducts($id);
        $_SESSION['error'] = "<script>
        alert(\"Đã xóa thành công!\");
        </script>";
        header("Location: ./products.php");
        die;
}if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $data = findProductById($id);
        $fileName = $data['img'];
        deleteProducts($id);
        
        $_SESSION['error'] = "<script>
                alert(\"Đã xóa thành công!\");
                </script>";
        header("Location: ./products.php");
        die;
}else {
        $_SESSION['error'] = "<script>
                alert(\"Xóa thất bại!\");
                </script>";
        header("Location: ./products.php");
}