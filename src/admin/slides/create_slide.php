<?php
 session_start();
 require_once './../../db/slide_conn.php';
 $sliderImage = $_FILES['slide_src'];
 if (strpos($sliderImage['type'], 'image') === false) {
    $error = " Không phải là ảnh!";
    $_SESSION['error'] = $error;
    header("Location: ./slider.php");
    die;
 }

 if ($sliderImage['size'] > 4000000) {
    $error = "File vượt quá dung lượng cho phép, phải nhỏ hơn 4mb!";
    $_SESSION['error'] = $error;
    header("Location: ./slider.php");
    die;
 }
    $storePath = './../../../assets/img/';
    $imageName = $sliderImage['name'];
    $path = $storePath . $imageName;
    move_uploaded_file($sliderImage['tmp_name'], $path);
 $data['image_name'] = $imageName;
 $data['slide_src'] = 'assets/img/' . $imageName;
 insertSlider($data);
 header("Location: ./slider.php");
?>