<?php

namespace App\Core\Mappers\Implementations;

use PDO;
use App\Core\DataBase\BDConection;
use App\Core\Models\Mueble;
use App\Core\Exceptions\DatabaseException;

class MuebleDataMapper
{
    private $conection;


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
            $success = true;

            $stmt = $this->conection->getInstancia();
            $stmt->beginTransaction();

            $query = "INSERT INTO MUEBLES (nombre, descripcion, precio, stock, medida, largo, ancho, categoria_id) VALUES (:nombre, :descripcion, :precio, :stock, :medida, :largo, :ancho, :categoria_id)";
            $result = $stmt->prepare($query);
            $result->bindValue('nombre', $mueble->getNombre());
            $result->bindValue('descripcion', $mueble->getDescripcion());
            $result->bindValue('precio', $mueble->getPrecio());
            $result->bindValue('stock', $mueble->getStock());
            $result->bindValue('medida', $mueble->getMedida());
            $result->bindValue('largo', $mueble->getLargo());
            $result->bindValue('ancho', $mueble->getAncho());
            $result->bindValue('categoria_id', $mueble->getCategoria()->getId());

            if (!$result->execute()) {
                $success = false;
            }

            if ($success) {
                $stmt->commit();
            } else {
                $stmt->rollBack();
            }
            return $success;

        } catch (PDOException $e) {
            throw new DatabaseException("Error al ejecutar la consulta: " . $e->getMessage());
        }
    }

    public function update(Mueble $mueble): bool
    {
        try {
            $success = true;

            $stmt = $this->conection->getInstancia();
            $stmt->beginTransaction();

            $query = "UPDATE MUEBLES SET nombre = :nombre, descripcion = :descripcion, precio = :precio, stock = :stock, medida = :medida, largo = :largo, ancho = :ancho , categoria_id = :categoria_id  WHERE mueble_id = :mueble_id";
            $result = $stmt->prepare($query);
            $result->bindValue('nombre', $mueble->getNombre());
            $result->bindValue('descripcion', $mueble->getDescripcion());
            $result->bindValue('precio', $mueble->getPrecio());
            $result->bindValue('stock', $mueble->getStock());
            $result->bindValue('medida', $mueble->getMedida());
            $result->bindValue('largo', $mueble->getLargo());
            $result->bindValue('ancho', $mueble->getAncho());
            $result->bindValue('categoria_id', $mueble->getCategoria()->getId());
            $result->bindValue("mueble_id", $mueble->getMuebleId());

            if (!$result->execute()) {
                $success = false;
            }

            if ($success) {
                $stmt->commit();
                if ($result->rowCount() < 1) {
                    $success = false;
                }
            } else {
                $stmt->rollBack();
            }
            return $success;

        } catch (PDOException $e) {
            throw new DatabaseException("Error al ejecutar la consulta: " . $e->getMessage());
        }
    }

    public function delete(int $mueble_id): bool
    {
        try {
            $success = true;

            $stmt = $this->conection->getInstancia();
            $stmt->beginTransaction();

            $query = "DELETE MUEBLES WHERE mueble_id = :mueble_id";
            $result = $stmt->prepare($query);
            $result->bindParam('mueble_id', $mueble_id);
            $data = $result->execute();

            if (!$result->execute()) {
                $success = false;
            }

            if ($success) {
                $stmt->commit();
                if ($result->rowCount() < 1) {
                    $success = false;
                }
            } else {
                $stmt->rollBack();
            }

            return $success;

        } catch (PDOException $e) {
            throw new DatabaseException("Error al ejecutar la consulta: " . $e->getMessage());
        }
    }
}
