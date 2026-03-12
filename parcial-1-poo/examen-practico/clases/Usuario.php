<?php

namespace Clases;

class clsUsuario
{
    var $vNombre;
    var $vCorreo;

    function __construct($nombre, $correo)
    {
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)){
            throw new \Exception('Correo Invalido: "' . $correo . '"');
        }
        $this->vNombre = $nombre;
        $this->vCorreo = $correo;
    }
    function __destruct()
    {
    
    }

    function getNombre()
    {
        return $this->vNombre;
    }
    function getCorreo()
    {
        return $this->vCorreo;
    }
}
?>