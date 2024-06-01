<?php

namespace src\services\interfaces;

use src\models\Mueble;

interface MuebleServiceInterface
{
    public function createMueble(string $nombre, string $descripcion, float $medida, float $largo, float $ancho): bool;

    public function getMuebleById(int $id): Mueble;

    public function getAllMuebles(): array;

    public function updateMueble(int $id, string $nombre, string $descripcion, float $medida, float $largo, float $ancho): bool;

    public function deleteMueble(int $id): bool;
}
