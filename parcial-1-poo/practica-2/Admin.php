<?php

require_once 'Usuario.php';

class Admin extends Usuario {
    
    // Método que retorna el rol de este usuario
    public function getRol(): string {
        return "Administrador";
    }
}