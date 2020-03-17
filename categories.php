<?php
require_once 'connect.php';

$sql = "SELECT * FROM categories";
$statement = $pdo->prepare($sql);
$statement->execute();
$categories = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Categories</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div style="display: inline-block">
                <h1>Мои категории</h1>
                <a href="createCategory.php" class="btn btn-success">Добавить</a>
            </div>
            <div style="display: inline-block; float: right">
                <h1>Мои продукты</h1>
                <a href="index.php" class="btn btn-success">Просмотреть</a>
            </div>
            <hr>
            <hr>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($categories as $el): ?>
                    <tr>
                        <td><?= $el['id']?></td>
                        <td><a href="showCategory.php?id=<?=$el['id']?>"><?= $el['title']?></a></td>
                        <td>
                            <a href="editCategory.php?id=<?=$el['id']?>" class="btn btn-warning">Изменить</a>
                            <a href="deleteCategory.php?id=<?=$el['id']?>" class="btn btn-danger" onclick="return confirm('Вы уверены?')">Удалить</a>
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
