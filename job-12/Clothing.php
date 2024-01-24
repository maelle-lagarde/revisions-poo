<?php

require_once 'Product.php';

class Clothing extends Product 
{
    public function __construct(
        private ?string $size = null,
        private ?string $color = null,
        private ?string $type = null,
        private ?int $material_fee = null,
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


     public static function findOneById(int $id) 
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=draft-shop', 'maelle.lagarde', 'root');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare('SELECT * FROM product WHERE id = :id');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $clothingData = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($clothingData) {
                $clothing= new Clothing(
                    $clothingData['size'],
                    $clothingData['color'],
                    $clothingData['type'],
                    $clothingData['material_fee'],
                    $clothingData['id'],
                    $clothingData['name'],
                    $clothingData['photos'],
                    $clothingData['price'],
                    $clothingData['description'],
                    $clothingData['quantity'],
                    new DateTime($clothingData['created_at']),
                    new DateTime($clothingData['updated_at']),
                    $clothingData['category_id']
                );

                return $clothing;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
            return false;
        }
    }

    public static function findAll() 
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=draft-shop', 'maelle.lagarde', 'root');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->query('SELECT * FROM product');
            $clothings = [];

            while ($clothingData = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $clothing = new Clothing(
                    $clothingData['size'],
                    $clothingData['color'],
                    $clothingData['type'],
                    $clothingData['material_fee'],
                    $clothingData['id'],
                    $clothingData['name'],
                    $clothingData['photos'],
                    $clothingData['price'],
                    $clothingData['description'],
                    $clothingData['quantity'],
                    new DateTime($clothingData['created_at']),
                    new DateTime($clothingData['updated_at']),
                    $clothingData['category_id']
                );

                $clothings[] = $clothing;
            }

            return $clothings;
        } catch (PDOException $e) {
            echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
            return [];
        }
    }

    public function create() 
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=draft-shop', 'maelle.lagarde', 'root');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare('INSERT INTO product (name, photos, price, description, quantity, created_at, updated_at, category_id) VALUES (:name, :photos, :price, :description, :quantity, :created_at, :updated_at, :category_id)');
            
            $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindValue(':photos', $this->photos, PDO::PARAM_STR);
            $stmt->bindValue(':price', $this->price, PDO::PARAM_STR);
            $stmt->bindValue(':description', $this->description, PDO::PARAM_STR);
            $stmt->bindValue(':quantity', $this->quantity, PDO::PARAM_INT);
            $stmt->bindValue(':created_at', $this->created_at->format('Y-m-d H:i:s'), PDO::PARAM_STR);
            $stmt->bindValue(':updated_at', $this->updated_at->format('Y-m-d H:i:s'), PDO::PARAM_STR);
            $stmt->bindValue(':category_id', $this->category_id, PDO::PARAM_INT);

            $stmt->execute();

            $this->id = $pdo->lastInsertId();

            return $this;
        } catch (PDOException $e) {

            echo 'Erreur d\'insertion en base de données : ' . $e->getMessage();
            return false;
        }
    }

    public function update()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=draft-shop', 'maelle.lagarde', 'root');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare('UPDATE product SET name = :name, photos = :photos, price = :price, description = :description, quantity = :quantity, updated_at = :updated_at, category_id = :category_id WHERE id = :id');
            
            $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
            $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindValue(':photos', $this->photos, PDO::PARAM_STR);
            $stmt->bindValue(':price', $this->price, PDO::PARAM_STR);
            $stmt->bindValue(':description', $this->description, PDO::PARAM_STR);
            $stmt->bindValue(':quantity', $this->quantity, PDO::PARAM_INT);
            $stmt->bindValue(':updated_at', $this->updated_at->format('Y-m-d H:i:s'), PDO::PARAM_STR);
            $stmt->bindValue(':category_id', $this->category_id, PDO::PARAM_INT);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Erreur de mise à jour en base de données : ' . $e->getMessage();
            return false;
        }
    }

}

// Exemple d'utilisation avec une instance de la classe Clothing.

// récupérer un produit avec son ID avec la méthode findOneById().

$clothingId = 2;
$clothing = Clothing::findOneById($clothingId);

var_dump($clothing);

// afficher tous les produits stockées en bdd avec la méthode findAll().

$clothings = Clothing::findAll();
var_dump($clothings);

// ajouter un produit avec la méthode create().
$newClothing = new Clothing();
$newClothing->setName("Swimming Suit");
$newClothing->setPhotos("https://festivalrtl2essonneenscene.seetickets.com/content/billetterie");
$newClothing->setPrice(75.00);
$newClothing->setDescription("Mykonos blue bikini");
$newClothing->setQuantity(13);
$newClothing->setCategoryId(2);
$newClothing->setSize("M");
$newClothing->setColor("Blue");
$newClothing->setType("i dont know what the fuck it is");
$newClothing->setMaterialFee("coton");

$newClothing->create();
var_dump($newClothing);

// mettre à jour un produit existant avec la méthode update().

$clothingIdToUpdate = 2;
$clothingToUpdate = Clothing::findOneById($clothingIdToUpdate);

$clothingToUpdate->setQuantity(13);

$clothingToUpdate->update();

var_dump($clothingToUpdate);

?>