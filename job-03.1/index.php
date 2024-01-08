<?php

class Product
{
    private int $id;
    private string $name;
    private array $photos;
    private float $price;
    private string $description;
    private int $quantity;
    private DateTime $createdAt;
    private DateTime $updatedAt;
    private int $categoryId;

    public function __construct(int $id = null, string $name = null, array $photos = null, float $price = null, string $description = null, int $quantity = null, DateTime $createdAt = null, DateTime $updatedAt = null, int $categoryId = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->photos = $photos;
        $this->price = $price;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->categoryId = $categoryId;
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

    public function getPhotos() : array
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
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function getCategoryId() : int
    {
        return $this->categoryId;
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

    public function setPhotos(array $photos)
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

    public function setCreatedAt(DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt(DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    public function setCategoryId(int $categoryId)
    {
        $this->categoryId = $categoryId;
    }
}


class Category 
{
    private int $id;
    private string $name;
    private string $description;
    private DateTime $createdAt;
    private DateTime $updatedAt;


    public function __construct(int $id = null, string $name = null, string $description = null, DateTime $createdAt = null, DateTime $updatedAt = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
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

    public function getDescription() : string
    {
        return $this->description;
    }

    public function getCreatedAt() : DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt() : DateTime
    {
        return $this->updatedAt;
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

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function setCreatedAt(DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt(DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
}

// Exemple d'utilisation
$category = new Category(1, 'Accessoire', 'Accessoires femme', new DateTime(), new DateTime());

$product = new Product(
    1,
    'Écharpe',
    ['https://picsum.photos/200/300'],
    1000,
    'ÉCHARPE LAINE',
    10,
    new DateTime(),
    new DateTime(),
    $category->getId()
);

// Utilisation de var_dump() pour afficher les propriétés
var_dump($category);
var_dump($product);