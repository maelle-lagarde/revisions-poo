<?php

class Product
{
    private int $id;
    private int $category_id;
    private string $name;
    private array $photos;
    private float $price;
    private string $description;
    private int $quantity;
    private DateTime $createdAt;
    private DateTime $updatedAt;

    public function __construct(int $id, int $category_id, string $name, array $photos, float $price, string $description, int $quantity, DateTime $createdAt, DateTime $updatedAt)
    {
        $this->id = $id;
        $this->category_id = $category_id;
        $this->name = $name;
        $this->photos = $photos;
        $this->price = $price;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    // Getters
    public function getId() : int
    {
        return $this->id;
    }

    public function getCategoryId() : int
    {
        return $this->category_id;
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

    // Setters
    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setCategoryId(int $category_id)
    {
        $this->category_id = $category_id;
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
}


class Category 
{
    private int $id;
    private string $name;
    private string $description;
    private DateTime $createdAt;
    private DateTime $updatedAt;


    public function __construct(int $id, string $name, string $description, DateTime $createdAt, DateTime $updatedAt)
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
$category = new Category(1, 'Clothing', 'Clothing category', new DateTime(), new DateTime());

$product = new Product(
    1,
    'T-shirt',
    ['https://picsum.photos/200/300'],
    1000,
    'A beautiful T-shirt',
    10,
    new DateTime(),
    new DateTime(),
    $category->getId()
);

// Utilisation de var_dump() pour afficher les propriétés
var_dump($category);
var_dump($product);