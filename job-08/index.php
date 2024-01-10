<?php

require_once 'Product.php';
require_once 'Category.php';

try {
    $allProducts = Product::findAll();

    foreach($allProducts as $product) {
        echo('<pre>');
        var_dump($product);
        echo('</pre>');
    }
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}

?>