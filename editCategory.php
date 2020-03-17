<?php
require_once 'connect.php';

$sql = "SELECT * FROM categories WHERE id = :id";
$statement = $pdo->prepare($sql);
$statement->execute($_GET);
$category = $statement->fetch(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Изменение</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Изменение категории</h1>
            <form action="additionalEditCategory.php" method="POST">
                <div class="form-group">
                    <label for="">Название</label>
                    <input name="title" type="text" class="form-control" value="<?=$category['title']?>">
                </div>

                <input type="hidden" name="id" value="<?=$category['id']?>">

                <div class="form-group">
                    <button class="btn btn-warning">Изменить</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
