<?php

$config = require 'config.php';
$config = $config['database'];

try {
    $pdo = new PDO(
        $config['host'] . ';dbname=' . $config['dbname'],
        $config['user'],
        $config['password']
    );
} catch (PDOException $e) {
    die($e->getMessage());
}
return $pdo;