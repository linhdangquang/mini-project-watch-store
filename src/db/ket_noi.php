<?php

header("Content-type: text/html; charset=utf-8");
// Khoi tao ket noi
function getConnection(){
    $dbUrl = "mysql: host=localhost; dbname=du_an_mau;charset=utf8";
    $dbUser = "root";
    $dbPass = "";
    try{
        $connection = new PDO($dbUrl, $dbUser, $dbPass);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    }catch(PDOException $e) {
        echo "Connection error" . $e->getMessage();
    }
}


// PDO LIB

function pdoExecuteData($sql, $data){
    $conn = getConnection();
    $statement = $conn->prepare($sql);
    $statement->execute($data);
}

function pdoExecuteItem($sql, $itemID) {
    $conn = getConnection();
    $statement = $conn->prepare($sql);
    $statement->execute(['id' => $itemID]);
}

function pdoExecuteFetchOne($sql, $itemID) {
    $conn = getConnection();
    $statement = $conn->prepare($sql);
    $statement->execute(['id' => $itemID]);
    $rowData = $statement->fetch();
    return $rowData;

}

function pdoExecuteFetchAll($sql) {
    $conn = getConnection();
    $statement = $conn->prepare($sql);
    $statement->execute();
    $rowData = $statement->fetchAll();
    return $rowData;
}


