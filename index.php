<?php
session_start();
require_once 'db/db.php';

$products = $connection->query("SELECT * FROM products")->fetchAll(PDO::FETCH_ASSOC);

$cats = $connection->query("SELECT cat FROM cats")->fetchAll(PDO::FETCH_ASSOC);
$colors = $connection->query("SELECT color FROM colors")->fetchAll(PDO::FETCH_ASSOC);
$weights = $connection->query("SELECT weight FROM weights")->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="select">
            <select name="cat" id="cat">
                <option value="all">Все категории</option>
                <?php foreach ($cats as $cat) { ?>
                    <option value="<?=$cat['cat']?>" <?php if ($_SESSION['cat'] == $cat['cat']) {echo "selected";}?>><?=$cat['cat']?></option>
                <?php } ?>
            </select>

            <select name="color" id="color">
                <option value="all">Любой узор</option>
                <?php foreach ($colors as $color) { ?>
                    <option value="<?=$color['color']?>" <?php if ($_SESSION['color'] == $color['color']) {echo "selected";}?>><?=$color['color']?></option>
                <?php } ?>
            </select>

            <select name="weight" id="weight">
                <option value="all">Любой размер</option>
                <?php foreach ($weights as $weight) { ?>
                    <option value="<?=$weight['weight']?>" <?php if ($_SESSION['weight'] == $weight['weight']) {echo "selected";}?>><?=$weight['weight']?></option>
                <?php } ?>
            </select>
        </div>

        <div class="row cards-block">
            <?php
            require_once 'actions/query.php'
            ?>
        </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/ajax.js"></script>
</body>
</html>

