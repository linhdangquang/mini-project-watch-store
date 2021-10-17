<?php
require_once 'ket_noi.php';

function getAllUsers() {
    $sql = "SELECT * FROM khach_hang";
    $data = pdoExecuteFetchAll($sql);
    return $data;
    unset($conn);

}

function insertUser(array $data) {
    $sql = "INSERT INTO khach_hang(ma_kh, ten , sdt, dia_chi, gioi_tinh , email, mat_khau, vai_tro)" . 
    "VALUES(:ma_kh, :ten_kh, :sdt, :dia_chi, :gioi_tinh, :email, :mat_khau, :vai_tro)";
    pdoExecuteData($sql, $data);
    unset($conn);
}


function findUserById(int $id) {
    $sql = "SELECT * FROM khach_hang WHERE id = :id";
    $data = pdoExecuteFetchOne($sql, $id);
    return $data;
    unset($conn);

}

function updateUser(array $data) {
    $sql = "UPDATE khach_hang SET  
        ma_kh = :ma_kh, ten = :ten, " . " sdt = :sdt, dia_chi = :dia_chi, gioi_tinh = :gioi_tinh, email = :email, mat_khau = :mat_khau, vai_tro = :vai_tro " 
        . " WHERE id = :id"  ;  
    pdoExecuteData($sql, $data);
    unset($conn);

}

function deleteUser(int $id) {
    $sql = "DELETE FROM khach_hang WHERE id = :id";
    pdoExecuteItem($sql, $id);
    unset($conn);
}

function checkUserExists($username,$tel,$email) {
    $sql = "SELECT * FROM khach_hang WHERE ma_kh='$username' OR sdt='$tel' OR email='$email'";
    $data = pdoExecuteFetchAll($sql);
    return $data;
    unset($conn);

}

function loginUser($username, $password) {
    $sql = "SELECT * FROM khach_hang WHERE ma_kh = :ma_kh " . "AND mat_khau = :mat_khau";
    $conn =getConnection();
    $data = [
        'ma_kh' => $username,
        'mat_khau' => $password,
    ];
    $statement = $conn->prepare($sql);
    $statement->execute($data);

    $row = $statement->fetch();

    if ($row == false) {
        return [];
    }

    $user = [
        'id' => $row['id'],
        'ma_kh' => $row['ma_kh'],
        'email' => $row['email'],
        'mat_khau' => $row['mat_khau'],
        'ten' => $row['ten'],
        'sdt' => $row['sdt'],
        'dia_chi' => $row['dia_chi'],
        'gioi_tinh' => $row['gioi_tinh'],
        'vai_tro' => $row['vai_tro'],
    ];
    return $user;
    unset($conn);

}


