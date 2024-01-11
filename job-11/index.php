<?php

require_once 'Product.php';

try {
    
    $productIdToUpdate = 11; // ID du produit à mettre à jour
    $productToUpdate = Product::findOneById($productIdToUpdate);

    // $productToUpdate->setName('Nouveau Nom');
    $productToUpdate->setPrice(120.00);
    // $productToUpdate->setDescription('Nouvelle Description');

    $isUpdateSuccessful = $productToUpdate->update();

    if ($isUpdateSuccessful) {
        echo 'Produit mis à jour!';
    } else {
        echo 'Erreur lors de la mise à jour du produit.';
    }
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}
?>