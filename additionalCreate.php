<?php
require_once 'connect.php';

$namePhoto = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];

$pathToPhoto = 'uploads/' . date('YmdHis') . $namePhoto;

move_uploaded_file($tmp_name, $pathToPhoto);

$name = $_POST['name'];
$category_id = $_POST['category'];
$description = $_POST['description'];
$status = isset($_POST['status']) ? 1 : 0;
$arr = ['name' => $name, 'description' => $description, 'status' => $status, 'photo' => $pathToPhoto, 'category_id' => $category_id];

$sql = "INSERT INTO products(name, description, status, photo, category_id) VALUES(:name, :description, :status, :photo, :category_id)";
$statement = $pdo->prepare($sql);
$statement->execute($arr);
header('Location: index.php');