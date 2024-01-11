<?php

require_once 'Product.php';

class Clothing extends Product 
{
    public function __construct(
        private ?string $size = null,
        private ?string $color = null,
        private ?string $type = null,
        private ?int $material_fee = null,
    ) {

    }

     // Getters
     public function getSize() : string
     {
         return $this->size;
     }
 
     public function getColor() : string
     {
         return $this->color;
     }
 
     public function getType() : string
     {
         return $this->type;
     }
 
     public function getMaterialFee() : int
     {
         return $this->material_fee;
     }
 
     // Setters
     public function setSize(string $size)
     {
         $this->size = $size;
     }
 
     public function setColor(string $color)
     {
         $this->color = $color;
     }
 
     public function setType(string $type)
     {
         $this->type = $type;
     }
 
     public function setMaterialFee(int $material_fee)
     {
         $this->material_fee = $material_fee;
     }
}
 
?>