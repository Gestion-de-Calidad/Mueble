<?php

namespace App\Core\Services\Implementations;

$droot=$_SERVER['DOCUMENT_ROOT'];
include_once $droot . '/Mueble/src/core/mappers/implementations/MuebleDataMapper.php';
use App\Core\Mappers\Implementations\MuebleDataMapper;
include_once $droot . '/Mueble/src/core/models/Mueble.php';
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

