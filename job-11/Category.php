<?php

class Category 
{
    public function __construct(
        private ?int $id = null,
        private ?string $name = null,
        private ?string $description = null,
        private ?DateTime $created_at = new DateTime(),
        private ?DateTime $updated_at = new DateTime(),
        )
    {
       
    }

    public function getProducts() 
    {
        
        $pdo = new PDO('mysql:host=localhost;dbname=draft-shop', 'maelle.lagarde', 'root');

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare('SELECT * FROM product WHERE category_id = :category_id');
        $stmt->bindValue(':category_id', $this->id, PDO::PARAM_INT);
        $stmt->execute();

        $products = [];

        while ($productData = $stmt->fetch()) {
            $products[] = new Product(
                $productData['id'],
                $productData['name'],
                $productData['photos'],
                $productData['price'],
                $productData['description'],
                $productData['quantity'],
                new DateTime($productData['created_at']),
                new DateTime($productData['updated_at']),
                $productData['category_id']
            );
        }
        return $products;
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
        return $this->created_at;
    }

    public function getUpdatedAt() : DateTime
    {
        return $this->updated_at;
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

    public function setCreatedAt(DateTime $created_at)
    {
        $this->created_at = $created_at;
    }

    public function setUpdatedAt(DateTime $updated_at)
    {
        $this->updated_at = $updated_at;
    }
}

?>