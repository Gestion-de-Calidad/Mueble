<?php

namespace src\models;

class Mueble
{
    private int $id;
    private ?string $nombre;
    private ?string $descripcion;
    private float $medida;
    private float $largo;
    private float $ancho;

    public function __construct(int $id,
                                string $nombre,
                                string $descripcion,
                                float $medida,
                                float $largo,
                                float $ancho)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->medida = $medida;
        $this->largo = $largo;
        $this->ancho = $ancho;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function getMedida(): float
    {
        return $this->medida;
    }

    public function setMedida(float $medida): void
    {
        $this->medida = $medida;
    }

    public function getLargo(): float
    {
        return $this->largo;
    }

    public function setLargo(float $largo): void
    {
        $this->largo = $largo;
    }

    public function getAncho(): float
    {
        return $this->ancho;
    }

    public function setAncho(float $ancho): void
    {
        $this->ancho = $ancho;
    }

}
