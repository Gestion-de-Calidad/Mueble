<?php

namespace Models;

class Mueble
{
    private int $mueble_id;
    private string $nombre;
    private ?string $descripcion;
    private float $precio;
    private int $stock;
    private float $largo;
    private float $ancho;
    private ?float $medida;

    /**
     * Mueble constructor.
     * @param int $mueble_id
     * @param string $nombre
     * @param string|null $descripcion
     * @param float $precio
     * @param int $stock
     * @param float $largo
     * @param float $ancho
     */
    public function __construct(string $nombre, ?string $descripcion, float $precio, int $stock, float $largo, float $ancho)
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->largo = $largo;
        $this->ancho = $ancho;
    }


    /**
     * @return int
     */
    public function getMuebleId(): int
    {
        return $this->mueble_id;
    }

    /**
     * @param int $mueble_id
     */
    public function setMuebleId(int $mueble_id): void
    {
        $this->mueble_id = $mueble_id;
    }

    /**
     * @return string|null
     */
    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    /**
     * @param string|null $nombre
     */
    public function setNombre(?string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string|null
     */
    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    /**
     * @param string|null $descripcion
     */
    public function setDescripcion(?string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return float
     */
    public function getPrecio(): float
    {
        return $this->precio;
    }

    /**
     * @param float $precio
     */
    public function setPrecio(float $precio): void
    {
        $this->precio = $precio;
    }

    /**
     * @return int
     */
    public function getStock(): int
    {
        return $this->stock;
    }

    /**
     * @param int $stock
     */
    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }


    /**
     * @return float
     */
    public function getLargo(): float
    {
        return $this->largo;
    }

    /**
     * @param float $largo
     */
    public function setLargo(float $largo): void
    {
        $this->largo = $largo;
    }

    /**
     * @return float
     */
    public function getAncho(): float
    {
        return $this->ancho;
    }

    /**
     * @param float $ancho
     */
    public function setAncho(float $ancho): void
    {
        $this->ancho = $ancho;
    }

    /**
     * @return float|null
     */
    public function getMedida(): ?float
    {
        return $this->medida;
    }

    /**
     * @param float|null  $medida
     */
    public function setMedida(?float $medida): void
    {
        $this->medida = $medida;
    }


}
