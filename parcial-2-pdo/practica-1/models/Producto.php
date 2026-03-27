<?php

class Producto {
    private $id;
    private $precio;
    private $existencia;
    private $nombre;
    private $descripcion;

    public function __construct($id = null, $nombre = null, $precio = null, $existencia = null, $descripcion = null)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->existencia = $existencia;
        $this->descripcion = $descripcion;
    }

    public function getPrecio() {
        return $this->precio;
    }
    public function getNombre() {
        return $this->nombre;  
    }
    public function getId() {
        return $this->id;
    }
    public function getExistencia() {
        return $this->existencia;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function setExistencia($existencia) {
        $this->existencia = $existencia;
    }
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
}