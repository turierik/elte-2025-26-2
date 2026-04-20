<?php
    include_once("Storage.php");
    $stor = new Storage(new JsonIO(__DIR__ . "/../data.json"));
    $id = $_GET["id"] ?? -1;
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
    Name: <?= $d["name"] ?> <br>
    Age: <?= $d["age"] ?> 
</body>
</html>