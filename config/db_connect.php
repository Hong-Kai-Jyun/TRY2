<?php
$host = "localhost";
$port = "3306";
$db_name = "test";
$username = "root";
$password = "XXXXXX";

try {
    $con = new PDO("mysql:host={$host};port={$port};dbname={$db_name}", $username, $password);
    //設定exception 模式
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
//to handle connection error
catch(PDOException $exception){
    echo "連結DB發生錯誤: " . $exception->getMessage();
}
?>