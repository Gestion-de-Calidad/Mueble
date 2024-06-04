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

}
