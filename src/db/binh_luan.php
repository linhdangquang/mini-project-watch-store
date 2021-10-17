<?php
    require_once 'ket_noi.php';
    
    function getAllComments() {
        $sql = "SELECT * FROM binh_luan ORDER BY ngay_bl DESC ";
        $data = pdoExecuteFetchAll($sql);
        return $data;
        unset($conn);
    }

    function insertComment(array $data) {
        $sql = "INSERT INTO binh_luan(noi_dung, ma_sp, ma_kh, ngay_bl) VALUES(:noi_dung, :ma_sp, :ma_kh, :ngay_bl)";
        pdoExecuteData($sql, $data);
        unset($conn);
    }

    function deleteComments($id) {
        $sql = "DELETE FROM binh_luan WHERE ma_bl = :id";
        pdoExecuteItem($sql, $id);
        unset($conn);
    }

    function findComment($id) {
        $sql = "SELECT * FROM binh_luan WHERE ma_bl = :id";
        $data = pdoExecuteFetchOne($sql, $id);
        return $data;
        unset($conn);
    }

    function findCommentsByProductId($id) {
        $sql = "SELECT * FROM binh_luan WHERE ma_sp = '$id' ORDER BY ngay_bl DESC LIMIT 0,10  ";
        $data = pdoExecuteFetchAll($sql);
        return $data;
        unset($conn);
    }

    function updateComment(array $data) {
        $sql = "UPDATE binh_luan SET noi_dung = :noi_dung WHERE ma_bl = :id";
        pdoExecuteData($sql, $data);
    }

?>