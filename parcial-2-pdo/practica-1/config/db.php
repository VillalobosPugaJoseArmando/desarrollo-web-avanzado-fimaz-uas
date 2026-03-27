<?php

$host = "localhost";
$db = "escuela";
$user = "root";
$pass = "";
$charset = "utf8mb4";

$dsn = "mysql:$host=host;dbname=$db;charset=$charset";

try{
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo"Conexion exitosa<br>";
}catch(PDOException $e){
    die("Error de conexion: " . $e->getMessage());
}

?>