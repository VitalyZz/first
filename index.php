<?php
require_once 'connect.php';

$sql = "SELECT products.id, products.name, products.description, products.photo, categories.title FROM products JOIN categories ON products.category_id = categories.id ORDER BY products.id";
$statement = $pdo->prepare($sql);
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Products</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div style="display: inline-block">
                    <h1>Мои продукты</h1>
                    <a href="create.php" class="btn btn-success">Добавить</a>
                </div>
                <div style="display: inline-block; float: right">
                    <h1>Мои категории</h1>
                    <a href="categories.php" class="btn btn-success">Перейти</a>
                </div>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Картинка</th>
                            <th>Категория</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($products as $el): ?>
                        <tr>
                            <td><?= $el['id']?></td>
                            <td><a href="show.php?id=<?=$el['id']?>"><?= $el['name']?></a></td>
                            <td><?= $el['description']?></td>
                            <td><img src="<?= $el['photo']?>" alt="" style="height: 100px; width: 100px;"></td>
                            <td><?=$el['title']?></td>
                            <td>
                                <a href="edit.php?id=<?=$el['id']?>" class="btn btn-warning">Изменить</a>
                                <a href="delete.php?id=<?=$el['id']?>" class="btn btn-danger" onclick="return confirm('Вы уверены?')">Удалить</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
