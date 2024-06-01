<?php

namespace src\mappers\implementations;


use PDO;
use src\database\BDConection;
use src\mappers\interfaces\MuebleMD;
use src\models\Mueble;
use src\exceptions\DatabaseException;

class MuebleDataMapper implements MuebleMD
{
    private BDConection $conexion;

    public function __construct()
    {
        $this->conexion = BDConection::getInstancia();
    }

    public function findByID(int $muebleId): Mueble
    {
        try {
            $query = "";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':id', $muebleId, PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                return new Mueble($data['id'], $data['nombre'], $data['descripcion'], $data['medida'], $data['largo'], $data['ancho']);
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
