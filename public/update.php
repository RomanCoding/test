<?php

require '../connection.php';

extract($_POST);

$statement = $pdo->prepare('SELECT COUNT(*) FROM categories
                                      WHERE id = ?');
$statement->execute([$category_id]);

if ($statement->fetchColumn()) {
    $statement = $pdo->prepare('UPDATE goods 
                                      SET category_id = :category_id, 
                                      goods.name = :name, 
                                      description = :description, 
                                      price = :price
                                      WHERE id = :id');
    $statement->execute([
        'category_id' => $category_id,
        'name' => $productName,
        'description' => $description,
        'price' => $price,
        'id' => $productId
    ]);

    echo json_encode([
        'updated' => $statement->rowCount() ? true : false,
        'category_id' => $category_id,
        'name' => $productName,
        'description' => $description,
        'price' => $price
    ]);
    exit(200);
}

echo json_encode([
    'updated' => false
]);