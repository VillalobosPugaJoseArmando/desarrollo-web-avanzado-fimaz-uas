<?php

namespace Clases;

class Admin extends Usuario {

    public function getRol(): string {
        return "Administrador";
    }
}