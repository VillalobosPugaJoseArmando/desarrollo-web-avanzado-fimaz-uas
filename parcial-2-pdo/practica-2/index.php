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

$mensaje = "";
$detalle = "";

// Procesar formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre       = trim($_POST["nombre"] ?? "");
    $apellido     = trim($_POST["apellido"] ?? "");
    $correo       = trim($_POST["correo"] ?? "");
    $simularError = isset($_POST["simular_error"]);

    if ($nombre === "" || $apellido === "" || $correo === "") {
        $mensaje = "? Todos los campos son obligatorios.";
    } else {
        try {
            // 1) Iniciar transaccion
            $pdo->beginTransaction();

            // 2) Insertar alumno
            $sqlAlumno  = "INSERT INTO alumnos (nombre, apellido, correo)
                           VALUES (:nombre, :apellido, :correo)";
            $stmtAlumno = $pdo->prepare($sqlAlumno);
            $stmtAlumno->execute([
                "nombre"   => $nombre,
                "apellido" => $apellido,
                "correo"   => $correo
            ]);

            $idAlumno = (int)$pdo->lastInsertId();

            // 3) Insertar log o simular error
            if ($simularError) {
                throw new Exception("Simulacion de error activada: se fuerza rollback.");
            } else {
                $sqlLog  = "INSERT INTO logs_alumnos (idAlumno, accion)
                            VALUES (:idAlumno, :accion)";
                $stmtLog = $pdo->prepare($sqlLog);
                $stmtLog->execute([
                    "idAlumno" => $idAlumno,
                    "accion"   => "ALTA_ALUMNO"
                ]);
            }

            // 4) Confirmar transaccion
            $pdo->commit();
            $mensaje = "? Transaccion confirmada (COMMIT). Alumno registrado con ID: $idAlumno";

        } catch (Exception $e) {
            if ($pdo->inTransaction()) {
                $pdo->rollBack();
            }
            $mensaje = "? Ocurrio un error. Transaccion revertida (ROLLBACK).";
            $detalle = $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Practica PDO: try/catch y transacciones</title>
    <style>
        body{font-family:Arial, sans-serif; margin:20px; line-height:1.4}
        .card{border:1px solid #ddd; border-radius:10px; padding:16px; margin-bottom:16px}
        .row{display:flex; gap:12px; flex-wrap:wrap}
        label{display:block; font-weight:bold; margin-bottom:6px}
        input[type="text"], input[type="email"]{width:280px; padding:8px; border:1px solid #ccc; border-radius:6px}
        button{padding:10px 14px; border:0; border-radius:8px; cursor:pointer}
        .btn{background:#0b5ed7; color:white}
        .btn:hover{opacity:.9}
        .msg{padding:10px; border-radius:8px; background:#f5f5f5}
        .small{font-size:12px; color:#666}
        table{border-collapse:collapse; width:100%}
        th,td{border:1px solid #ddd; padding:8px; text-align:left}
        th{background:#f0f0f0}
        .danger{color:#b02a37}
    </style>
</head>
<body>

<h2>Practica: try/catch y transacciones (PDO + MySQL)</h2>

<div class="card">
    <form method="POST">
        <div class="row">
            <div>
                <label>Nombre</label>
                <input type="text" name="nombre" maxlength="15" value="<?= htmlspecialchars($_POST['nombre'] ?? 'Jose Alfonso') ?>">
            </div>
            <div>
                <label>Apellido</label>
                <input type="text" name="apellido" maxlength="10" value="<?= htmlspecialchars($_POST['apellido'] ?? 'Aguilar') ?>">
            </div>
            <div>
                <label>Correo</label>
                <input type="email" name="correo" maxlength="50" value="<?= htmlspecialchars($_POST['correo'] ?? 'ja.aguilar@uas.edu.mx') ?>">
            </div>
        </div>

        <p>
            <label style="font-weight:normal">
                <input type="checkbox" name="simular_error" <?= isset($_POST['simular_error']) ? 'checked' : '' ?>>
                Simular error para forzar ROLLBACK
            </label>
            <span class="small">(Activa para comprobar que no se guarda nada si falla un paso.)</span>
        </p>

        <button class="btn" type="submit">Registrar alumno</button>
    </form>
</div>

</body>
</html>