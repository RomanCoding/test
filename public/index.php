<?php

require '../connection.php';

$statement = $pdo->prepare('select g.name as productName, g.id, g.description, g.price, g.category_id,
                                              c.name as categoryName from goods g
                                              inner join categories c
                                              on g.category_id = c.id
                                              ORDER BY g.id ASC');
$statement->execute();
$goods = $statement->fetchAll(PDO::FETCH_OBJ);

$statement = $pdo->prepare('select * from categories');
$statement->execute();
$categories = $statement->fetchAll(PDO::FETCH_OBJ);

require '../index.view.php';
