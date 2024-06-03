<?php

namespace App\Core\Services\Implementations;

use App\Core\Mappers\Implementations\MuebleDataMapper;
use App\Core\Models\Mueble;


class MuebleServiceImpl
{
    private $mapper;

    /**
     * MuebleServiceImpl constructor.
     * @param MuebleDataMapper $dataMapper
     */
    public function __construct()
    {
        $this->mapper = new MuebleDataMapper();
    }


    public function getMuebleById(int $id)
    {
        $this->mapper->findByID($id);
        // TODO: Implement getMuebleById() method.
    }

    public function getAllMuebles(): array
    {
        // TODO: Implement getAllMuebles() method.
    }

    public function insertMueble()
    {
        // TODO: Implement insertMueble() method.
    }

    public function updateMueble(): bool
    {
        // TODO: Implement updateMueble() method.
    }

    public function deleteMueble(int $id): bool
    {
        // TODO: Implement deleteMueble() method.
    }

}

