<?php
    include_once("Storage.php");
    $stor = new Storage(new JsonIO(__DIR__ . "/../data.json"));
    $data = $stor -> findAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach($data as $d): ?>
        <a href="show.php?id=<?= $d["id"] ?>"><?= $d["name"] ?></a> <br>
    <?php endforeach; ?>
</body>
</html>