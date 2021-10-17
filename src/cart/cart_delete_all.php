<?php
    session_start(); 
    foreach ($_SESSION['id_them_vao_gio'] as $key => $value) {
        if (true) {
            unset($_SESSION["id_them_vao_gio"]);
        }
    }
    header("Location: /du_an_mau/cart.php");

?>