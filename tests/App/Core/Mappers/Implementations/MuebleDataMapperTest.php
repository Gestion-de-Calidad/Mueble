<?php

namespace TestMapper;

use PDOException;
use Mappers\MuebleDataMapper;
use PHPUnit\Framework\TestCase;
use Models\Mueble;

class MuebleDataMapperTest extends TestCase
{

    public function testFindByID()
    {
        $mapper = new MuebleDataMapper();
        $muebleId = 4;
        $mueble = $mapper->findByID($muebleId);
        $this->assertInstanceOf(Mueble::class, $mueble);
    }

    public function testFindByIDInvalid()
    {
        $mapper = new MuebleDataMapper();
        $muebleId = 1;
        $mueble = $mapper->findByID($muebleId);
        $this->assertNull($mueble);
    }

    public function testFindAll()
    {
        $mapper = new MuebleDataMapper();
        $mueble = $mapper->findAll();
        $this->assertIsArray($mueble);
    }

    public function testFindAllNull()
    {
        $mapper = new MuebleDataMapper();
        $mueble = $mapper->findAll();
        $this->assertc($mueble);
    }

    public function testInsert()
    {
        $mapper = new MuebleDataMapper();
        $mueble = new Mueble();
        $mueble->setNombre('Silla Moderna');
        $mueble->setDescripcion('Silla de diseño moderno');
        $mueble->setPrecio(50.00);
        $mueble->setStock(10);
        $mueble->setLargo(1.5);
        $mueble->setAncho(1.5);
        $mueble->setMedida($mueble->getAncho() * $mueble->getLargo());
        $result = $mapper->insert($mueble);
        $this->assertTrue($result);
    }

    public function testUpdate()
    {
        $mapper = new MuebleDataMapper();
        $muebleId = 4;
        $mueble = $mapper->findByID($muebleId);

        $mueble->setNombre('Mesa de Comedor');
        $mueble->setDescripcion('Mesa de comedor para 6 personas');
        $mueble->setPrecio(200.00);
        $mueble->setStock(8);
        $mueble->setLargo(1.5);
        $mueble->setAncho(2.5);
        $mueble->setMedida($mueble->getLargo() * $mueble->getAncho());
        $result = $mapper->update($mueble);
        $this->assertTrue($result);
    }

    public function testDelete()
    {
        $mapper = new MuebleDataMapper();
        $muebleId = 4;
        $mueble = $mapper->findByID($muebleId);
        $result = $mapper->delete($mueble->getMuebleId());
        $this->assertTrue($result);
    }

}
