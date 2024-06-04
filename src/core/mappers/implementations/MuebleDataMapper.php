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
        try {

            $stmt = $this->conection->getInstancia();
            $query = "SELECT * FROM MUEBLES WHERE mueble_id = :mueble_id";
            $result = $stmt->prepare($query);
            $result->bindParam('mueble_id', $muebleId, PDO::PARAM_INT);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_CLASS, Mueble::class);
            $mueble = $result->fetch();
            return $mueble;

        } catch (PDOException $e) {
            throw new DatabaseException("Error al ejecutar la consulta: " . $e->getMessage());
        }
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
