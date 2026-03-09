<?php
declare(strict_types=1);

spl_autoload_register(function (string $clase) {
    // Toma solo el nombre de la clase sin el namespace
    $nombreClase = basename(str_replace('\\', '/', $clase));
    $ruta = __DIR__ . DIRECTORY_SEPARATOR . $nombreClase . '.php';
    if (file_exists($ruta)) {
        require $ruta;
    }
});

use App\Usuario;

// Crear instancia
$usuario = new Usuario('Ana López', 'ana@correo.com');

echo "Nombre: " . $usuario->getNombre() . "\n";
echo "Correo: " . $usuario->getCorreo() . "\n";

// Probar setters
$usuario->setNombre('Armando Villalobos');
$usuario->setCorreo('joarvipu2003@gmail.com');

echo "\n-- Después de actualizar --\n";
echo "Nombre: " . $usuario->getNombre() . "\n";
echo "Correo: " . $usuario->getCorreo() . "\n";