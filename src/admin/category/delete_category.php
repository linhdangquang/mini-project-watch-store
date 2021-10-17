<?php
    session_start();
    require_once './../../db/loai.php';
    if (isset($_POST['multi_delete'])) {
        $id = $_POST['check'];
        deleteType($id);
        header("Location: ./category_page.php"); 
        $_SESSION['error'] = "<script>
        alert(\"Đã xóa thành công!\");
        </script>";
        die;
    }
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        deleteType($id);
        header("Location: ./category_page.php"); 
        $_SESSION['error'] = "<script>
        alert(\"Đã xóa thành công!\");
        </script>";

    }
?>