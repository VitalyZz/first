<?php
require_once 'connect.php';

$sql = 'DELETE FROM categories WHERE id = :id';
$statement = $pdo->prepare($sql);
$statement->execute($_GET);
header('Location: categories.php');