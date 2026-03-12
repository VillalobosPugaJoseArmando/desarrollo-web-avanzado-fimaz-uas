<?php

namespace Clases;

class clsAdministrador extends clsUsuario
{
    function __construct($nombre, $correo)
    {
        parent::__construct($nombre, $correo);

    }

    function getRol()
    {
        return 'Administrador';
    }
}
?>