<?php

namespace App\Core\Services\Implementations;

use App\Core\Mappers\Implementations\CategoriaDataMapper;
use App\Core\Models\Categoria;

class CategoriaServiceImpl
{
    private $mapper;

    /**
     * MuebleServiceImpl constructor.
     * @param CategoriaDataMapper $dataMapper
     */
    public function __construct()
    {
        $this->mapper = new CategoriaDataMapper();
    }

    public function getCategoriaById(int $id): Categoria
    {
        $this->mapper->findByID($id);
        // TODO: Implement getCategoriaById() method.
    }

    public function getAllCategorias(): array
    {
        // TODO: Implement getAllCategorias() method.
    }

    public function insertCategoria()
    {
        // TODO: Implement insertCategoria() method.
    }

    public function updateCategoria(): bool
    {
        // TODO: Implement updateCategoria() method.
    }

    public function deleteCategoria(int $id): bool
    {
        // TODO: Implement deleteCategoria() method.
    }

}