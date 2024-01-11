<?php

require_once 'Product.php';

class Electronic extends Product
{
    public function __construct(
        private ?string $brand = null,
        private ?int $waranty_fee = null,
    ) {

    }

    // Getters
    public function getBrand() : string
    {
        return $this->brand;
    }

    public function getWarantyFee() : int
    {
        return $this->waranty_fee;
    }

    // Setters
    public function setBrand(string $brand)
    {
        $this->brand = $brand;
    }

    public function setWarantyFee(int $waranty_fee)
    {
        $this->waranty_fee = $waranty_fee;
    }
}