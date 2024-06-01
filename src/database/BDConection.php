<?php


namespace src\database;

use PDO;
use PDOException;
use src\exceptions\DatabaseException;

class BDConection
{
    private static $instancia = null;
    private $conexion;

    private function __construct()
    {
        $config = require __DIR__ . '/../../config/database.php';

        try {
            $this->conexion = new PDO($config['dsn'], $config['usuario'], $config['contraseña']);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new DatabaseException("Error al conectar con la base de datos: " . $e->getMessage());
        }

    }

    public static function getInstancia(): self
    {
        if (self::$instancia === null) {
            self::$instancia = new self();
        }

        return self::$instancia->conexion;
    }
}
