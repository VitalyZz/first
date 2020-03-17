<?php
require_once 'connect.php';

$sql = "SELECT * FROM categories WHERE id = :id";
$statement = $pdo->prepare($sql);
$statement->execute($_GET);
$category = $statement->fetch(PDO::FETCH_ASSOC);

$sqlProducts = "SELECT name FROM products LEFT JOIN categories ON products.id = categories.id WHERE products.category_id = :id";
$statementProducts = $pdo->prepare($sqlProducts);
$statementProducts->execute($_GET);
$products = $statementProducts->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div><h1>Просмотр категории - <?=$category['title']?></h1></div>
            <div><h2>Продукты данной категории:</h2></div>
            <?php foreach($products as $el):?>
                <h3 style="color:#ff7863"><?=$el['name']?></h3>
            <?php endforeach;?>
        </div>
    </div>
</div>
</body>
</html>
