<?php
require_once 'connect.php';

$sql = 'DELETE FROM products WHERE id = :id';
$statement = $pdo->prepare($sql);
$statement->execute($_GET);
header('Location: index.php');