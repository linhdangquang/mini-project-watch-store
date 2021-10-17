<?php
require_once 'ket_noi.php';

function getAllSliders() {
    $sql = "SELECT * FROM slider";
    $data = pdoExecuteFetchAll($sql);
    return $data;
    unset($conn);
}

function insertSlider(array $data) {
    $sql = "INSERT INTO slider(image_name, slide_src)" . " VALUES(:image_name, :slide_src)";
    pdoExecuteData($sql, $data);
    unset($conn);
}

function getSlider(int $id) {
    $sql = "SELECT * FROM slider WHERE id = :id";
    $data = pdoExecuteFetchOne($sql, $id);
    return $data;
    unset($conn);
}

function deleteSlider(int $id) {
    $sql = "DELETE FROM slider WHERE id = :id" ;
    pdoExecuteItem($sql, $id);
    unset($conn);
}


?>