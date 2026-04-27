<?php
namespace models;

class Producto {
    private ?int $id;
    private ?string $nombre;
    private ?string $descripcion;
    private ?int $existencia;
    private ?float $precio;

    public function __construct(
        ?int $id = null,
        ?string $nombre = null,
        ?string $descripcion = null,
        ?int $existencia = null,
        ?float $precio = null
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->existencia = $existencia;
        $this->precio = $precio;
    }

    public function getId(): ?int { return $this->id; }
    public function getNombre(): ?string { return $this->nombre; }
    public function getDescripcion(): ?string { return $this->descripcion; }
    public function getExistencia(): ?int { return $this->existencia; }
    public function getPrecio(): ?float { return $this->precio; }

    public function setId(?int $id): void { $this->id = $id; }
    public function setNombre(string $nombre): void { $this->nombre = $nombre; }
    public function setDescripcion(string $descripcion): void { $this->descripcion = $descripcion; }
    public function setExistencia(int $existencia): void { $this->existencia = $existencia; }
    public function setPrecio(float $precio): void { $this->precio = $precio; }
}