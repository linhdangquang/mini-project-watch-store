<?php
session_start();
$deleteItemCart = $_GET['id'];

foreach ($_SESSION['id_them_vao_gio'] as $key => $value) {
    if ($value == $deleteItemCart) 
        // unset($_SESSION['id_them_vao_gio'][$key]);
        array_splice($_SESSION['id_them_vao_gio'], $key, 1);
    if(empty($_SESSION["id_them_vao_gio"])){
        unset($_SESSION["id_them_vao_gio"]);
    }
    
}


header("Location: /du_an_mau/cart.php");


