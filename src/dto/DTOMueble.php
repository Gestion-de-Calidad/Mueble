<?php

namespace src\dto;

class DTOMueble
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

}
