<?php

namespace Mappers;

use PDO;
use PDOException;
use DataBase\BDConection;
use Models\Mueble;
use Exceptions\DatabaseException;

class MuebleDataMapper
{
    private $conection;


    public function __construct()
    {
        $this->conection = new BDConection();
    }

    public function findByID(int $muebleId): ?Mueble
    {
        try {
            $stmt = $this->conection->getInstancia();
            $query = "SELECT * FROM MUEBLES WHERE mueble_id = :mueble_id";
            $result = $stmt->prepare($query);
            $result->bindParam('mueble_id', $muebleId, PDO::PARAM_INT);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_CLASS, Mueble::class);
            $mueble = $result->fetch();

            if(!$mueble){
                return null;
            }

        } catch (PDOException $e) {
            throw new DatabaseException("Error al ejecutar la consulta: " . $e->getMessage());
        }

        return $mueble;
    }

    public function findAll(): array
    {
        try {
            $stmt = $this->conection->getInstancia();
            $query = "SELECT * FROM MUEBLES";
            $result = $stmt->prepare($query);
            $result->execute();
            $muebleList = $result->fetchAll(PDO::FETCH_CLASS, Mueble::class);
            return $muebleList;

        } catch (PDOException $e) {
            throw new DatabaseException("Error al ejecutar la consulta: " . $e->getMessage());
        }
    }

    public function insert(Mueble $mueble): bool
    {
        try {

            $stmt = $this->conection->getInstancia();
            $stmt->beginTransaction();

            $query = "INSERT INTO MUEBLES (nombre, descripcion, precio, stock, medida, largo, ancho) VALUES (:nombre, :descripcion, :precio, :stock, :medida, :largo, :ancho)";
            $result = $stmt->prepare($query);
            $result->bindValue('nombre', $mueble->getNombre());
            $result->bindValue('descripcion', $mueble->getDescripcion());
            $result->bindValue('precio', $mueble->getPrecio());
            $result->bindValue('stock', $mueble->getStock());
            $result->bindValue('medida', $mueble->getMedida());
            $result->bindValue('largo', $mueble->getLargo());
            $result->bindValue('ancho', $mueble->getAncho());

            if ($result->execute()) {
                $stmt->commit();
            }

        } catch (PDOException $e) {
            $stmt->rollBack();
            return false;
            throw new DatabaseException("Error al ejecutar la consulta: " . $e->getMessage());
        }

        return true;
    }

    public function update(Mueble $mueble): bool
    {
        try {

            $stmt = $this->conection->getInstancia();
            $stmt->beginTransaction();

            $query = "UPDATE MUEBLES SET nombre = :nombre, descripcion = :descripcion, precio = :precio, stock = :stock, medida = :medida, largo = :largo, ancho = :ancho  WHERE mueble_id = :mueble_id";
            $result = $stmt->prepare($query);
            $result->bindValue('nombre', $mueble->getNombre());
            $result->bindValue('descripcion', $mueble->getDescripcion());
            $result->bindValue('precio', $mueble->getPrecio());
            $result->bindValue('stock', $mueble->getStock());
            $result->bindValue('medida', $mueble->getMedida());
            $result->bindValue('largo', $mueble->getLargo());
            $result->bindValue('ancho', $mueble->getAncho());
            $result->bindValue("mueble_id", $mueble->getMuebleId());


            if ($result->execute()) {
                $stmt->commit();
            }

        } catch (PDOException $e) {
            $stmt->rollBack();
            return false;
            throw new DatabaseException("Error al ejecutar la consulta: " . $e->getMessage());
        }
        return true;
    }

    public function delete(int $mueble_id): bool
    {
        try {

            $stmt = $this->conection->getInstancia();
            $stmt->beginTransaction();

            $query = "DELETE MUEBLES WHERE mueble_id = :mueble_id";
            $result = $stmt->prepare($query);
            $result->bindParam('mueble_id', $mueble_id);
            $data = $result->execute();

            if ($result->execute()) {
                $stmt->commit();
            }

        } catch (PDOException $e) {
            $stmt->rollBack();
            return false;
            throw new DatabaseException("Error al ejecutar la consulta: " . $e->getMessage());
        }

        return true;
    }
}
