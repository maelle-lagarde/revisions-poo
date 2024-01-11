<?php

require_once 'Product.php';
require_once 'Category.php';

try {

    $newProduct = new Product();
    $newProduct->setName('Veste');
    $newProduct->setPhotos('https://image1.lacoste.com/dw/image/v2/AAQM_PRD/on/demandware.static/Sites-FR-Site/Sites-master/fr/dwde0b7b88/SF1632_CM9_24.jpg?imwidth=915&impolicy=product');
    $newProduct->setPrice(170.00);
    $newProduct->setDescription('SWEATSHIRT ZIPPÉ PARIS COLOR-BLOCK EN INTERLOCK PIQUÉ');
    $newProduct->setQuantity(92);
    $newProduct->setCategoryId(4);

    $createdProduct = $newProduct->create();

    if ($createdProduct !== false) {
        
        echo('<pre>');
        var_dump($createdProduct);
        echo('</pre>');
    } else {
        echo 'Erreur lors de la création du produit.';
    }
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}