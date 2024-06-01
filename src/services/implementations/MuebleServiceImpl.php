<?php

namespace src\services\implementations;

use src\mappers\implementations\MuebleDataMapper;
use src\models\Mueble;
use src\services\interfaces\MuebleServiceInterface;

class MuebleServiceImpl implements MuebleServiceInterface
{
    private $mapper;

    public function __construct()
    {
        $this->mapper = new MuebleDataMapper();
    }

    public function createMueble(string $nombre,
                                 string $descripcion,
                                 float $medida,
                                 float $largo,
                                 float $ancho): bool
    {
        // TODO: Implement createMueble() method.
    }

    public function getMuebleById(int $id): Mueble
    {
        return $this->mapper->findByID($id);
    }

    public function getAllMuebles(): array
    {
        // TODO: Implement getAllMuebles() method.
    }

    public function updateMueble(int $id,
                                 string $nombre,
                                 string $descripcion,
                                 float $medida,
                                 float $largo,
                                 float $ancho): bool
    {
        // TODO: Implement updateMueble() method.
    }

    public function deleteMueble(int $id): bool
    {
        // TODO: Implement deleteMueble() method.
    }

}

