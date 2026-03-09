<?php

spl_autoload_register(function (string $className) {
    $archivo = __DIR__ . '/' . str_replace(['App\\', '\\'], ['', '/'], $className) . '.php';

    if (file_exists($archivo)) {
        require_once $archivo;
    }
});

use App\Admin;

$admin = new Admin("Armando Villalobos", "joarvipu2003@gmail.com");

echo "Nombre: " . $admin->getNombre() . "<br>";
echo "Correo: " . $admin->getCorreo() . "<br>";
echo "Rol: "    . $admin->getRol()    . "<br>";
