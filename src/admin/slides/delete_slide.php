<?php
 session_start();
 require_once './../../db/slide_conn.php';
 $id = $_GET['id'];
 $data = getSlider($id);
 $fileName = $data['image_name'];
 unlink("F://xampp//htdocs//du_an_mau//assets//img//$fileName");
 deleteSlider($id);
 $_SESSION['done_delete'] = "<script>
 alert(\"Đã xóa thành công!\");
</script>";

 
 header("Location: ./slider.php");

?>