<?php

// Configuracion
$host    = "localhost";
$db      = "escuela";
$user    = "root";
$pass    = "3939";
$charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Conexion PDO (con excepciones)
try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Error de conexion: " . $e->getMessage());
}