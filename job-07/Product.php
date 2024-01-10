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
        private ?DateTime $created_at = new DateTime(), 
        private ?DateTime $updated_at = new DateTime(), 
        private ?int $category_id = null,
        ) {
       
        }

    public function getCategory() {
        
        $pdo = new PDO('mysql:host=localhost;dbname=draft-shop', 'maelle.lagarde', 'root');

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare('SELECT * FROM category WHERE id = :category_id');
        $stmt->bindValue(':category_id', $this->category_id, PDO::PARAM_INT);
        $stmt->execute();

        $categoryData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($categoryData) {
            return new Category(
                $categoryData['id'],
                $categoryData['name'],
                $categoryData['description'],
                new DateTime($categoryData['created_at']),
                new DateTime($categoryData['updated_at'])
            );
        } else {
            return null;
        }
    }

    public static function findOneById(int $id) {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=draft-shop', 'maelle.lagarde', 'root');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare('SELECT * FROM product WHERE id = :id');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $productData = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($productData) {
                return new Product(
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
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
            return false;
        }
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