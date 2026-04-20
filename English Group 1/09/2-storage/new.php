<?php
    $name = $_POST["name"] ?? "";
    $age = $_POST["age"] ?? 0;
    if ($_POST){
        include_once('Storage.php');
        $stor = new Storage(new JsonIO(__DIR__ . "/../data.json"));
        // do the validation, error messages, etc.
        $stor -> add([
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
    <form action="new.php" method="POST">
        Name: <input type="text" name="name"> <br> 
        Age: <input type="number" name="age"> <br>
        <button type="submit">Save</button>
    </form>
</body>
</html>