<?php


namespace DataBase;

use PDO;
use PDOException;
use Exceptions\DatabaseException;

class BDConection
{
    private static $instancia = null;
    private $conexion;

    public function __construct()
    {
        $config = require __DIR__ . '/../../../config/database.php';

        try {
            $this->conexion = new PDO($config['dsn'], $config['usuario'], $config['contraseña']);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new DatabaseException("Error al conectar con la base de datos: " . $e->getMessage());
        }

    }

    public static function getInstancia()
    {
        if (self::$instancia === null) {
            self::$instancia = new self();
        }

        return self::$instancia->conexion;
    }
}
