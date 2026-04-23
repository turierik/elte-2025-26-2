<?php
    $id = $_GET["id"] ?? -1;
    include_once("Storage.php");
    $stor = new Storage(new JsonIO(__DIR__ . "/../data.json"));
    $d = $stor -> findById($id);
    if ($d === null){
        header("location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    ID: <?= $d["id"] ?> <br>
    Név: <?= $d["name"] ?> <br>
    Kor: <?= $d["age"] ?>
</body>
</html>