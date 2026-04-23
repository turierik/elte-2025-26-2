<?php
    $id = $_GET["id"] ?? -1;
    $data = json_decode(file_get_contents(__DIR__ .  "/../data.json"), true);
    if (!isset($data[$id])){
        header("location: index.php");
        exit();
    }
    $d = $data[$id];
    if ($_POST){
        $name = $_POST["name"] ?? "";
        $age = $_POST["age"] ?? "";
        // validáció :)
        $data[$id] = [
            "id" => $id,
            "name" => $name,
            "age" => intval($age)
        ];
        file_put_contents(__DIR__ . "/../data.json", json_encode($data, JSON_PRETTY_PRINT));
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
    <form action="edit.php?id=<?= $id ?>" method="POST">
        Név: <input type="text" name="name" value="<?= $d["name"] ?>"> <br>
        Kor: <input type="number" name="age" value="<?= $d["age"] ?>"> <br>
        <button type="submit">Mentés</button>
    </form>
</body>
</html>