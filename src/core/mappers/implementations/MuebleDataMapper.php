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
            $query = "SELECT * FROM MUEBLE WHERE id = :id";
            $result = $stmt->prepare($query);
            $result->bindParam('id', $muebleId, PDO::PARAM_INT);
            $result->execute();
            $data = $result->fetchAll(PDO::FETCH_ASSOC);

            if(data){
                return new Mueble($data['id'], $data['nombre'], $data['descripcion'],$data['precio'],$data['stock'], $data['medida'], $data['largo'], $data['ancho']);
            }

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
