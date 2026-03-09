<?php

spl_autoload_register(function ($clase) {
    $ruta = __DIR__ . '/clases/' . basename($clase) . '.php';
    if (file_exists($ruta)) {
        require_once $ruta;
    }
});

use Clases\Admin;
use Clases\Alumno;
use Clases\Invitado;

$usuarios = [];
$error = "";

try {
    $usuarios[] = new Admin("Armando Villalobos", "joarvipu2003@gmail.com");
    $usuarios[] = new Alumno("Juan Pérez", "juan@example.com", "2021-10001");
    $usuarios[] = new Invitado("María García", "maria@empresa.com", "TechCorp");
    $usuarios[] = new Admin("Error User", "correo-malo");
} catch (\Exception $e) {
    $error = "Error controlado: " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Usuarios</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .error { color: red; margin-top: 15px; font-weight: bold; }
    </style>
</head>
<body>
    <h2>Sistema de Usuarios</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>Matrícula</th>
            <th>Empresa</th>
        </tr>
        <?php foreach ($usuarios as $u): ?>
        <tr>
            <td><?= $u->getNombre() ?></td>
            <td><?= $u->getCorreo() ?></td>
            <td><?= $u->getRol() ?></td>
            <td><?= ($u instanceof Alumno) ? $u->getMatricula() : "—" ?></td>
            <td><?= ($u instanceof Invitado) ? $u->getEmpresa() : "—" ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php if ($error): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>
</body>
</html>