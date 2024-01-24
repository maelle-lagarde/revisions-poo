<?php

require_once 'Product.php';

class Electronic extends Product
{
    public function __construct(
        private ?string $brand = null,
        private ?int $waranty_fee = null,
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


    public static function findOneById(int $id) 
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=draft-shop', 'maelle.lagarde', 'root');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare('SELECT * FROM product WHERE id = :id');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $electronicData = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($electronicData) {
                $electro= new Electronic(
                    $electronicData['brand'],
                    $electronicData['waranty_fee'],
                    $electronicData['id'],
                    $electronicData['name'],
                    $electronicData['photos'],
                    $electronicData['price'],
                    $electronicData['description'],
                    $electronicData['quantity'],
                    new DateTime($electronicData['created_at']),
                    new DateTime($electronicData['updated_at']),
                    $electronicData['category_id']
                );

                return $electro;
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
            $electronics = [];

            while ($electronicData = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $allElectronics = new Clothing(
                    $electronicData['brand'],
                    $electronicData['waranty_fee'],
                    $electronicData['id'],
                    $electronicData['name'],
                    $electronicData['photos'],
                    $electronicData['price'],
                    $electronicData['description'],
                    $electronicData['quantity'],
                    new DateTime($electronicData['created_at']),
                    new DateTime($electronicData['updated_at']),
                    $electronicData['category_id']
                );

                $electronics[] = $allElectronics;
            }

            return $allElectronics;
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

$electronicId = 2;
$electronic = Electronic::findOneById($electronicId);

var_dump($electronic);

// afficher tous les produits stockées en bdd avec la méthode findAll().

$electronics = Electronic::findAll();
var_dump($electronics);

// ajouter un produit avec la méthode create().
$newElectronic = new Electronic();
$newElectronic->setName("Swimming Suit");
$newElectronic->setPhotos("https://festivalrtl2essonneenscene.seetickets.com/content/billetterie");
$newElectronic->setPrice(75.00);
$newElectronic->setDescription("Mykonos blue bikini");
$newElectronic->setQuantity(13);
$newElectronic->setCategoryId(2);
$newElectronic->setBrand("Lacoste");
$newElectronic->setWarantyFee(19.90);

$newElectronic->create();
var_dump($newElectronic);

// mettre à jour un produit existant avec la méthode update().

$electronicIdToUpdate = 5;
$electronicToUpdate = Electronic::findOneById($electronicIdToUpdate);

$electronicToUpdate->setQuantity(7);

$electronicToUpdate->update();

var_dump($electronicToUpdate);

?>