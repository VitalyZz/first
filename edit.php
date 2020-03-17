<?php
require_once 'connect.php';

$sql = "SELECT * FROM products WHERE id = :id";
$statement = $pdo->prepare($sql);
$statement->execute($_GET);
$product = $statement->fetch(PDO::FETCH_ASSOC);

$sqlCategories = "SELECT * FROM categories";
$statementCategories = $pdo->query($sqlCategories);
$categories = $statementCategories->fetchAll(PDO::FETCH_ASSOC);
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
            <h1>Изменение продукта</h1>
            <form action="additionalEdit.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Название</label>
                    <input name="name" type="text" class="form-control" value="<?=$product['name']?>">
                </div>

                <div class="form-group">
                    <label for="">Описание</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control"><?=$product['description']?></textarea>
                </div>

                <div class="form-group">
                    <label for="">Категория</label>
                    <select name="category" class="form-control">
                        <?php foreach($categories as $el):?>
                            <option value="<?=$el['id']?>" <?php if($el['id'] == $product['category_id']):?> selected <?php endif;?>><?=$el['title']?></option>
                        <?php endforeach;?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Картинка</label>
                    <input type="file" name="photo" class="form-control-file">
                    <img src="<?=$product['photo']?>" alt="" style="margin-top: 10px;height: 100px; width: 100px;">
                </div>

                <div class="form-group">
                    <label for="">Показывать</label>
                    <input type="checkbox" name="status" <?php echo $product['status'] == 1 ? 'checked' : ''?>>
                </div>

                <input type="hidden" name="id" value="<?=$product['id']?>">

                <div class="form-group">
                    <button class="btn btn-warning">Изменить</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
