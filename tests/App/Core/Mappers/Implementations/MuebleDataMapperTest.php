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
        $muebleId = 8;
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

    public function testInsertException()
    {
        $mapper = new MuebleDataMapper();
        $mueble = new Mueble();
        $mueble->setNombre('Silla Moderna');
        $mueble->setDescripcion('Silla de diseño moderno');
        $mueble->setPrecio('Eder');
        $mueble->setStock(10);
        $mueble->setLargo(1.5);
        $mueble->setAncho(1.5);
        $mueble->setMedida($mueble->getAncho() * $mueble->getLargo());
        $result = $mapper->insert($mueble);
        $this->expectException($result);
    }


    public function testUpdate()
    {
        $mapper = new MuebleDataMapper();
        $muebleId = 6;
        $mueble = $mapper->findByID($muebleId);

        $mueble->setNombre($mueble->getNombre());
        $mueble->setDescripcion($mueble->getDescripcion());
        $mueble->setPrecio(49.00);
        $mueble->setStock($mueble->getStock());
        $mueble->setLargo($mueble->getLargo());
        $mueble->setAncho($mueble->getAncho());
        $mueble->setMedida($mueble->getLargo() * $mueble->getAncho());
        $result = $mapper->update($mueble);
        $this->assertTrue($result);
    }

    public function testDelete()
    {
        $mapper = new MuebleDataMapper();
        $muebleId = 7;
        $mueble = $mapper->findByID($muebleId);
        $result = $mapper->delete($mueble->getMuebleId());
        $this->assertTrue($result);
    }

}
