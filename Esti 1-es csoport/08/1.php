<?php
    $a = $_GET["a"] ?? "";
    $b = $_GET["b"] ?? "";

    $errors = [];
    if ($_GET){
        if ($a == "")
            $errors["a"] = "a-t meg kell adni!";
        else if (filter_var($a, FILTER_VALIDATE_FLOAT) === false)
            $errors["a"] = "a legyen szám!";

        if ($b == "")
            $errors["b"] = "b-t meg kell adni!";
        else if (filter_var($b, FILTER_VALIDATE_FLOAT) === false)
            $errors["b"] = "b legyen szám!";
        else if ($b == 0)
            $errors["b"] = "b nem lehet 0!";

        if (count($errors) === 0)
            $x = $a / $b;
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
    <form action="1.php" method="GET">
        A = <input type="number" name="a" value="<?= $a ?>">
        <?= $errors["a"] ?? "" ?>
        <br>

        B = <input type="number" name="b" value="<?= $b ?>">
        <?= $errors["b"] ?? "" ?>
        <br>
        <button type="submit">Oszd el őket!</button>
    </form>
    <?php if(isset($x)): ?>
       Eredmény: <?= $x ?>
    <?php endif; ?>
</body>
</html>