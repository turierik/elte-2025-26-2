<?php
    $id = $_GET["id"] ?? -1;
    $data = json_decode(file_get_contents(__DIR__ .  "/../data.json"), true);
    
    if (!isset($data[$id])){
        header("location: index.php");
        exit();
    }
    
    
    $d = $data[$id];
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