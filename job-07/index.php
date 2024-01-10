<?php

require_once 'Product.php';
require_once 'Category.php';

try {
    $productId = 7;
    $foundProduct = Product::findOneById($productId);

    if ($foundProduct !== false) {
        echo('<pre>');
        var_dump($foundProduct);
        echo('</pre>');
    } else {
        echo 'Aucun produit trouvé avec l\'ID ' . $productId;
    }
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}

?>