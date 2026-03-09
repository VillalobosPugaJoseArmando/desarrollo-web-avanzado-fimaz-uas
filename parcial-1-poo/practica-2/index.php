<?php

require_once 'Admin.php';

$admin = new Admin("Armando Villalobos", "joarvipu2003@gmail.com");

echo "Nombre: " . $admin->getNombre() . "<br>";
echo "Correo: " . $admin->getCorreo() . "<br>";
echo "Rol: " . $admin->getRol() . "<br>";

