<?php

require_once 'Product.php';
require_once 'Category.php';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=draft-shop', 'maelle.lagarde', 'root');

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare('SELECT * FROM product WHERE id = :id');
    $stmt->bindValue(':id', 7, PDO::PARAM_STR);
    $stmt->execute();

    $productData = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($productData) {
        
        $productInstance = new Product(
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

        $productCategory = $productInstance->getCategory();

        echo('<pre>');
        var_dump($productCategory);
        echo('</pre>');

    } else {
        echo 'Le produit n\'a pas été trouvé!';
    }
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}

?>