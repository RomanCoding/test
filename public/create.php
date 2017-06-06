<?php

require '../connection.php';

extract($_POST);

$statement = $pdo->prepare('SELECT COUNT(*) FROM categories
                                      WHERE id = ?');
$statement->execute([$category_id]);

if ($statement->fetchColumn()) {
    $statement = $pdo->prepare('INSERT into goods 
                                      SET category_id = :category_id, 
                                      goods.name = :name, 
                                      description = :description, 
                                      price = :price');
    $statement->execute([
        'category_id' => $category_id,
        'name' => $productName,
        'description' => $description,
        'price' => $price,
    ]);

    echo json_encode([
        'created' => $statement->rowCount() ? true : false,
        'category_id' => $category_id,
        'name' => $productName,
        'description' => $description,
        'price' => $price,
        'id' => $pdo->lastInsertId()
    ]);
    exit(200);
}

echo json_encode([
    'success' => false
]);