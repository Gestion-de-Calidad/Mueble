<?php

namespace src\mappers\interfaces;

use \src\models\Mueble;

interface MuebleMD
{

    public function findByID(int $muebleId): Mueble;
    public function insert(Mueble $mueble): bool;
    public function update(Mueble $mueble): bool;
    public function delete(Mueble $mueble): bool;

}
