<?php
    session_start();
    require_once './../../db/binh_luan.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        deleteComments($id);
        header("Location: ./comments_page.php"); 
        $_SESSION['error'] = "<script>
        alert(\"Đã xóa thành công!\");
        </script>";
        die;
    }else {
        header("Location: ./comments_page.php"); 
        $_SESSION['error'] = "<script>
        alert(\"ERROR!\");
        </script>";
        die;
    }

?>