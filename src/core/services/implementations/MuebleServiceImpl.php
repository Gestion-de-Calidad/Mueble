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
        $mueble->setMedida($mueble->getAncho() * $mueble->getLargo());
        return $this->mapper->insert($mueble);
    }

    public function updateMueble(Mueble $mueble): bool
    {
        $mueble->setMedida($mueble->getAncho() * $mueble->getLargo());
        return $this->mapper->update($mueble);
    }

    public function deleteMueble(int $mueble_id): bool
    {
        $this->getMuebleById($mueble_id);
        return $this->mapper->delete($mueble_id);
    }

}

