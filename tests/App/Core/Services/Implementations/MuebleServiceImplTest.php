<?php

namespace services;

use App\Core\Services\Implementations\MuebleServiceImpl;
use App\Core\Models\Mueble;
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

        $result = $service->insertMueble();
        $this->assertPostConditions(true, $result);
    }

    public function testUpdateMueble()
    {
        $service = new MuebleServiceImpl();
        $result = $service->updateMueble();
        $this->assertPostConditions(true, $result);
    }

    public function testDeleteMueble()
    {
        $service = new MuebleServiceImpl();
        $result = $service->deleteMueble(4);
        $this->assertNotFalse($result);
    }
}
