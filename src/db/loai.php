<?php
    require_once('ket_noi.php');

    function getAllTypes() {
        $sql = "SELECT * FROM loai_hang";
        $data = pdoExecuteFetchAll($sql);
        return $data;
        unset($conn);
    }

    function insertType(array $data) {  
        $sql = "INSERT INTO loai_hang (ten_loai) VALUES(:ten_loai)";
        pdoExecuteData($sql, $data);
        unset($conn);
    }

    function updateType(array $data) { 
        $sql = "UPDATE loai_hang SET ten_loai = :ten_loai WHERE ma_loai = :id";
        pdoExecuteData($sql, $data);
        unset($conn);
    }

    function getTypeById(int $id) { 
        $sql = "SELECT * FROM loai_hang WHERE ma_loai = :id";
        $data = pdoExecuteFetchOne($sql, $id);
        return $data;
        unset($conn);
    }

    function deleteType($id) {
        $sql = "DELETE FROM loai_hang WHERE ma_loai = :id";
        if (is_array($id)) {
            foreach ($id as $ma_loai){
                pdoExecuteItem($sql, $ma_loai);
            }
        }else {
            pdoExecuteItem($sql, $id);
        }
        unset($conn);
    }

    function loai_exists( $id) { 
        $sql = "SELECT * FROM loai_hang WHERE ten_loai = :id";
        return pdoExecuteFetchOne($sql, $id) >0;
    }


?>