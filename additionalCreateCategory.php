<?php
require_once 'connect.php';

$title = $_POST['title'];

$sql = "INSERT INTO categories(title) VALUES(?)";
$statement = $pdo->prepare($sql);
$statement->bindValue(1, $title);
$statement->execute();
header('Location: categories.php');