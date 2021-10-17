<?php

require_once 'ket_noi.php';

function getAllProducts() {
    $sql = "SELECT * FROM hang_hoa ORDER BY ten_loai, gia ASC";
    $data = pdoExecuteFetchAll($sql);
    return $data;
    unset($conn);

}

function getProductsLimit($start_from, $limit) {
    $sql = "SELECT * FROM hang_hoa ORDER BY id ASC LIMIT $start_from, $limit";
    $data = pdoExecuteFetchAll($sql);
    return $data;
    unset($conn);

}

function getProductsByCategory($category) {
    $sql = "SELECT * FROM hang_hoa WHERE ten_loai = '$category' ORDER BY  gia ASC";
    $data = pdoExecuteFetchAll($sql);
    return $data;
    unset($conn);
}

function getProductsRelated($category, $id) {
    $sql = "SELECT * FROM hang_hoa WHERE ten_loai = '$category' AND id != '$id' ORDER BY RAND()LIMIT 0,4";
    $data = pdoExecuteFetchAll($sql);
    return $data;
    unset($conn);
}

function getProductsSpecial() {
    $sql = "SELECT * FROM hang_hoa WHERE dac_biet = 1  LIMIT 0,8 ";
    $data = pdoExecuteFetchAll($sql);
    return $data;
    unset($conn);
}

function insertProduct (array $data) {
    $sql = "INSERT INTO hang_hoa(ma_sp, ten_sp , so_luong, gia, don_vi, mo_ta, img , ten_loai, dac_biet)" . 
    " VALUES(:ma_sp, :ten_sp, :so_luong, :gia, :don_vi, :mo_ta, :img, :ten_loai, :dac_biet)";
    pdoExecuteData($sql, $data);
    unset($conn);
}

function findProductById(int $id) {
    $sql = "SELECT * FROM hang_hoa WHERE id = :id";
    $data = pdoExecuteFetchOne($sql, $id);
    return $data;
    unset($conn);

}

function updateProduct(array $data) {
    $sql = "UPDATE hang_hoa SET  
        ma_sp = :ma_sp, ten_sp = :ten_sp, " . " so_luong = :so_luong, gia = :gia, don_vi = :don_vi, mo_ta = :mo_ta, ten_loai = :ten_loai, dac_biet = :dac_biet" 
        . " WHERE id = :id"  ;  
    pdoExecuteData($sql, $data);
    unset($conn);
}

function deleteProducts($id) {
    $sql = "DELETE FROM hang_hoa WHERE id = :id";
    if (is_array($id)) {
        foreach ($id as $ma_loai){
            pdoExecuteItem($sql, $ma_loai);
        }
    }else {
        pdoExecuteItem($sql, $id);
    }
    unset($conn);
}

function searchProducts($search) {
    $sql = "SELECT * FROM hang_hoa WHERE ten_sp like '%$search%' OR ten_loai like '%$search%' ";
    $data = pdoExecuteFetchAll($sql);
    return $data;
    unset($conn);
}
