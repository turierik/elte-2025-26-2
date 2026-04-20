<?php
    include_once('Storage.php');
    $stor = new Storage(new JsonIO(__DIR__ . "/../data.json"));
    $id = $_GET["id"] ?? -1;
    $d = $stor -> findById($id);
    if ($d === null){
        header("location: index.php");
        exit();
    }
    $name = $_POST["name"] ?? "";
    $age = $_POST["age"] ?? 0;
    if ($_POST){
        // do the validation, error messages, etc.
        $stor -> update($id, [
            "id" => $id,
            "name" => $name,
            "age" => intval($age)
        ]);
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