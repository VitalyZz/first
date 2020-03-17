<?php
require_once 'connect.php';

$title = $_POST['title'];
$id = $_POST['id'];

$sql = "UPDATE categories SET title = ? WHERE id = ?";
$statement = $pdo->prepare($sql);
$statement->bindValue(1, $title);
$statement->bindValue(2, $id);
$statement->execute();
header('Location: categories.php');