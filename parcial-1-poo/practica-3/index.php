<?php

spl_autoload_register(function ($clase) {
    $ruta = __DIR__ . '/clases/' . basename($clase) . '.php';
    if (file_exists($ruta)) {
        require_once $ruta;
    }
});

use Clases\Admin;
use Clases\Alumno;

echo "=== Prueba con datos válidos ===\n";

try {
    $admin = new Admin("Armando Villalobos", "joarvipu2003@gmail.com");
    echo "Nombre: " . $admin->getNombre() . "\n";
    echo "Correo: " . $admin->getCorreo() . "\n";
    echo "Rol: " . $admin->getRol() . "\n";
} catch (\InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\n=== Prueba con alumno válido ===\n";

try {
    $alumno = new Alumno("Juan Pérez", "juan@example.com", "2021-10001");
    echo "Nombre: " . $alumno->getNombre() . "\n";
    echo "Correo: " . $alumno->getCorreo() . "\n";
    echo "Matrícula: " . $alumno->getMatricula() . "\n";
    echo "Rol: " . $alumno->getRol() . "\n";
} catch (\InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\n=== Prueba con correo inválido ===\n";

try {
    $invalido = new Admin("Error User", "correo-malo");
    echo "Nombre: " . $invalido->getNombre() . "\n";
} catch (\InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}