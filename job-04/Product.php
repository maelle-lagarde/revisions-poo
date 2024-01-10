<?php

class Product
{
    public function __construct(
        private ?int $id = null, 
        private ?string $name = null, 
        private ?string $photos = null,
        private ?float $price = null, 
        private ?string $description = null, 
        private ?int $quantity = null, 
        private ?DateTime $created_at = null, 
        private ?DateTime $updated_at = null, 
        private ?int $category_id = null,
        ) {
       
        }

    // Getters
    public function getId() : int
    {
        return $this->id;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getPhotos() : string
    {
        return $this->photos;
    }

    public function getPrice() : float
    {
        return $this->price;
    }

    public function getDescription() : string
    {
        return $this->description;
    }

    public function getQuantity() : int
    {
        return $this->quantity;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function getCategoryId() : int
    {
        return $this->category_id;
    }

    // Setters
    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setPhotos(string $photos)
    {
        $this->photos = $photos;
    }

    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }

    public function setCreatedAt(DateTime $created_at)
    {
        $this->created_at = $created_at;
    }

    public function setUpdatedAt(DateTime $updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function setCategoryId(int $category_id)
    {
        $this->category_id = $category_id;
    }
}

?>