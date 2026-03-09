<?php
declare(strict_types=1);

namespace App;

class Usuario {
    // Atributos privados (encapsulamiento)
    private string $nombre;
    private string $correo;

    // Constructor
    public function __construct(string $nombre, string $correo) {
        $this->nombre = $nombre;
        $this->correo = $correo;
    }

    // Getters
    public function getNombre(): string {
        return $this->nombre;
    }

    public function getCorreo(): string {
        return $this->correo;
    }

    // Setters
    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function setCorreo(string $correo): void {
        $this->correo = $correo;
    }
}