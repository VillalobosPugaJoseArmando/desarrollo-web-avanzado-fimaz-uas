<?php

class Usuario {
    // Atributos (los "datos" del usuario)
    private string $nombre;
    private string $correo;

    // Constructor: se ejecuta cuando creamos un Usuario
    public function __construct(string $nombre, string $correo) {
        $this->nombre = $nombre;
        $this->correo = $correo;
    }

    // Método para obtener el nombre
    public function getNombre(): string {
        return $this->nombre;
    }

    // Método para obtener el correo
    public function getCorreo(): string {
        return $this->correo;
    }
}