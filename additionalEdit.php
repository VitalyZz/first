<?php
require_once 'connect.php';
$name = $_POST['name'];
$description = $_POST['description'];
$status = isset($_POST['status']) ? 1 : 0;
$id = $_POST['id'];

if ($_FILES['photo']['size'] !== 0) {
    $namePhoto = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
}

$sqlPhoto = "SELECT photo FROM products WHERE id = ?";
$stmt = $pdo->prepare($sqlPhoto);
$stmt->bindValue(1, $id);
$stmt->execute();
$path = $stmt->fetch(PDO::FETCH_ASSOC);

//echo '<pre>'; var_dump($path);
//echo '<br>';
//echo '<br>';
//echo '<br>';
//echo '<pre>'; var_dump($path['photo']);exit();

if ($_FILES['photo']['size'] !== 0) {
    $pathToPhoto = 'uploads/' . date('YmdHis') . $namePhoto;
    move_uploaded_file($tmp_name, $pathToPhoto);
} else {
    $pathToPhoto = $path['photo'];
}

$sql = "UPDATE products SET name = ?, description = ?, status = ?, photo = ? WHERE id = ?";
$statement = $pdo->prepare($sql);
$statement->bindValue(1, $name);
$statement->bindValue(2, $description);
$statement->bindValue(3, $status);
$statement->bindValue(4, $pathToPhoto);
$statement->bindValue(5, $id);
$statement->execute();

header('Location: index.php');

if ($_FILES['photo']['size'] !== 0) {
    unlink($path['photo']);
}