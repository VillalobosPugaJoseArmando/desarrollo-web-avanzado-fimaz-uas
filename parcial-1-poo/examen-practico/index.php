<?php

spl_autoload_register(function ($clase) {
    $mapa = [
        'Clases\\clsAdministrador' => __DIR__ . '/clases/Administrador.php',
        'Clases\\clsAlumno' => __DIR__ . '/clases/Alumno.php',
        'Clases\\clsUsuario' => __DIR__ . '/clases/Usuario.php',
    ];
    if (isset($mapa[$clase])){
        require $mapa[$clase];
    }
});

use Clases\clsAdministrador;
use Clases\clsAlumno;

$objAdministrador  = null;
$objAlumno  = null;

try {
    $objAdministrador = new clsAdministrador('Armando Villalobos', 'joarvipu2003@gmail.com');

} catch (Exception $e) {
    echo '<p>Usuario erroneo: Armando Villalobos - ' . $e ->getMessage() . '</p>';

}

try {
    $objAlumno = new clsAlumno('Irene Puga', 'puga@gmail.com', '12345');
} catch (Exception $e) {
    echo '<p>Usuario erroneo: Irene Puga - ' . $e ->getMessage() . '</p>';
}

$errorInvalido = null;
try {
    $objInvalido = new clsAlumno('Pedro Ramirez', 'nada', '098765');
}catch (Exception $e) {
    $errorInvalido = $e->getMessage();
}

echo 'table border="1" cellpadding="5">';
echo '<tr><th>Nombre</th><th>Correo</th><th>Rol</th><th>Matricula</th></tr>';

if ($objAdministrador !== null) {
    echo '<tr>';
    echo '<td>' . $objAdministrador->getNombre() . '</td>';
    echo '<td>' . $objAdministrador->getCorreo() . '</td>';
    echo '<td>' . $objAdministrador->getRol() . '</td>';
    echo '<td> N/A </td>';
    echo '</tr>';
}

if ($objAlumno !== null) {
    echo '<tr>';
    echo '<td>' . $objAlumno->getNombre() . '</td>';
    echo '<td>' . $objAlumno->getCorreo() . '</td>';
    echo '<td>' . $objAlumno->getRol() . '</td>';
    echo '<td>' . $objAlumno->getMatricula() . '</td>';
    echo '</tr>';
}

echo '</table>';

if ($errorInvalido !== null) {
    echo '<p>Usuario erroneo: Pedro Ramirez - ' . $errorInvalido . '</p>';

}

?>