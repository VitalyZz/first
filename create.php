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
    <title>Создание</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Добавление продукта</h1>
                <form action="additionalCreate.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Название</label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <div class="form-group">
                        <label for="">Описание</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Категория</label>
                        <select name="category" class="form-control">
                            <?php foreach($categories as $el):?>
                                <option value="<?=$el['id']?>"><?=$el['title']?></option>
                            <?php endforeach;?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Картинка</label>
                        <input type="file" name="photo" class="form-control-file">
                    </div>

                    <div class="form-group">
                        <label for="">Показывать</label>
                        <input type="checkbox" name="status" checked>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
