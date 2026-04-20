<?php
    $name = $_POST["name"] ?? "";
    $age = $_POST["age"] ?? "";
    if ($_POST){
        // do the validation, errors, etc.
        $data = json_decode(file_get_contents(__DIR__ . "/../data.json"), true);
        $id = uniqid();
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
    <form action="new.php" method="POST">
        Name: <input type="text" name="name"> <br>
        Age: <input type="number" name="age"> <br>
        <button type="submit">Save</button>
    </form>
</body>
</html>