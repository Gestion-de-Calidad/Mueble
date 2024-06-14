<?php

namespace services;

use Services\MuebleServiceImpl;
use Models\Mueble;
use PHPUnit\Framework\TestCase;

class MuebleServiceImplTest extends TestCase
{

    public function testGetMuebleById()
    {
        $service = new MuebleServiceImpl();
        $mueble = $service->getMuebleById(1);
        $this->assertInstanceOf(Mueble::class, $mueble);
    }

    public function testGetMuebleAll()
    {
        $service = new MuebleServiceImpl();
        $mueble = $service->getAllMuebles();
        $this->assertIsArray($mueble);
    }

    public function testInsertMueble()
    {
        $service = new MuebleServiceImpl();
        $mueble = new Mueble('mesa', 'comedor', 100000, 5, 2.5, 1.5);
        $result = $service->insertMueble($mueble);
        $this->assertTrue($result);
    }

    public function testInsertMuebleCamposVacios()
    {
        $service = new MuebleServiceImpl();
        $mueble = new Mueble(null,null,null,null,null,null);
        $result = $service->insertMueble($mueble);
        $this->assertTrue($result);
    }

    public function testInsertMuebleNotDescripcion()
    {
        $service = new MuebleServiceImpl();
        $mueble = new Mueble('Silla Moderna',null,50.00,10, 0.5,0.5);
        $result = $service->insertMueble($mueble);
        $this->assertTrue($result);
    }

    public function testInsertMuebleNotFloatInt()
    {
        $service = new MuebleServiceImpl();
        $mueble = new Mueble('Silla Moderna',null,'prueba1','prueba2', 'prueba3','prueba4');
        $result = $service->insertMueble($mueble);
        $this->assertTrue($result);
    }


    public function testUpdateMueble()
    {
        $service = new MuebleServiceImpl();
        $mueble = $service->getMuebleById(1);
        $mueble->setNombre('Mesa de Comedor');
        $mueble->setDescripcion('Mesa de comedor para 6 personas');
        $mueble->setPrecio(200.00);
        $mueble->setStock(8);
        $mueble->setLargo( 1.5);
        $mueble->setAncho( 2.5);
        $result = $service->updateMueble($mueble);
        $this->assertTrue($result);
    }

    public function testDeleteMueble()
    {
        $service = new MuebleServiceImpl();
        $result = $service->deleteMueble(1);
        $this->assertTrue($result);
    }
}
