<?php

namespace Services;

use Mappers\MuebleDataMapper;
use Models\Mueble;

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

    public function getMuebleById(int $id): Mueble
    {
        return $this->mapper->findByID($id);
    }

    public function getAllMuebles(): array
    {
        return $this->mapper->findAll();
    }

    public function insertMueble(Mueble $mueble): bool
    {

        return $this->mapper->insert($mueble);
    }

    public function updateMueble(Mueble $mueble): bool
    {
        return $this->mapper->update($mueble);
    }

    public function deleteMueble(int $mueble_id): bool
    {
        return $this->mapper->delete($mueble_id);
    }

}

