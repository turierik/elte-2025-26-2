<?php
    $id = $_GET["id"] ?? -1;
    $data = json_decode(file_get_contents(__DIR__ . "/../data.json"), true);
    if (!isset($data[$id])){
        header("location: index.php");
        exit();
    }
    $d = $data[$id];
    $name = $_POST["name"] ?? "";
    $age = $_POST["age"] ?? 0;
    if ($_POST){
        // do the validation, error messages, etc.
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
        Name: <input type="text" name="name" value="<?= $d["name"] ?>"> <br> 
        Age: <input type="number" name="age" value="<?= $d["age"] ?>"> <br>
        <button type="submit">Save</button>
    </form>
</body>
</html>