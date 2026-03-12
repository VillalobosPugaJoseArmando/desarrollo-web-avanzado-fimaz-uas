<?php

namespace Clases;

class clsAlumno extends clsUsuario
{
    var $vMatricula;

    function __construct($nombre, $correo, $matricula)
    {
        parent::__construct($nombre, $correo);
        $this->vMatricula = $matricula;
    }
    function getMatricula()
    {
        return $this->vMatricula;
    }

    function getRol()
    {
        return 'Alumno';
    }
}
?>