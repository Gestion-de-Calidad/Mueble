<?php

namespace App\Core\Mappers\Implementations;

use PDO;
use App\Core\DataBase\BDConection;
use App\Core\Models\Categoria;
use App\Core\Exceptions\DatabaseException;

class CategoriaDataMapper
{
    private $conection;


    public function __construct()
    {
        $this->conection = new BDConection();
    }

    public function findByID(int $categoriaId): Categoria
    {
        try {

            $query = "SELECT * FROM CATEGORIA WHERE ID = ?";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':id', $categoriaId, PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                return new Categoria($data['id'],$data['nombre'] ,$data['descripcion']);
            }

        } catch (PDOException $e) {
            throw new DatabaseException("Error al ejecutar la consulta: " . $e->getMessage());
        }
    }

    public function insert(Categoria $categoria): bool
    {
        // TODO: Implement insert() method.
    }

    public function update(Categoria $categoria): bool
    {
        // TODO: Implement update() method.
    }

    public function delete(Categoria $categoria): bool
    {
        // TODO: Implement delete() method.
    }

}
