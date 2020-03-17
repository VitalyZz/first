<?php
require_once 'connect.php';

$sql = "SELECT * FROM products WHERE id = :id";
$statement = $pdo->prepare($sql);
$statement->execute($_GET);
$product = $statement->fetch(PDO::FETCH_ASSOC);
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
            <div class="col-md-8">
                <div><h1>Просмотр продукта - <?=$product['name']?></h1></div>
                <div><p><?=$product['description']?></p></div>
                <div><img src="<?=$product['photo']?>" alt=""></div>
                <div>Категория - Новая категория</div>
                <div>Статус - Показывать</div>
            </div>
        </div>
    </div>
</body>
</html>
