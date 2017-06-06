<?php

require '../connection.php';

$statement = $pdo->prepare('DELETE FROM goods WHERE id = ?');

if ($statement->execute([$_POST['id']])) {
    echo json_encode([
        'success' => true
    ]);
    exit(200);
}

echo json_encode([
    'success' => false
]);