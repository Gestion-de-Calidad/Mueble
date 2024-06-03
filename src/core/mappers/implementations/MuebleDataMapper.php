<?php

namespace App\Core\Mappers\Implementations;

use PDO;
use App\Core\DataBase\BDConection;
use App\Core\Models\Mueble;
use App\Core\Exceptions\DatabaseException;

class MuebleDataMapper
{
    private  $conection;


    public function __construct()
    {
        $this->conection = new BDConection();
    }


    public function findByID(int $muebleId): Mueble
    {
        // TODO: Implement insert() method.
    }

    public function insert(Mueble $mueble): bool
    {
        // TODO: Implement insert() method.
    }

    public function update(Mueble $mueble): bool
    {
        // TODO: Implement update() method.
    }

    public function delete(Mueble $mueble): bool
    {
        // TODO: Implement delete() method.
    }
}
