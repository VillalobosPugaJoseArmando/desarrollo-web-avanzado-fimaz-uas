<?php

namespace App;

class Admin extends Usuario {

    public function getRol(): string {
        return "Administrador";
    }
}