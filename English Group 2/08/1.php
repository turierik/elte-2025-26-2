<?php
    $a = $_GET["a"] ?? "";
    $b = $_GET["b"] ?? "";

    $errors = [];
    if ($_GET){
        if ($a === "")
            $errors["a"] = "a must not be empty.";
        else if (filter_var($a, FILTER_VALIDATE_FLOAT) === false)
            $errors["a"] = "a must be a number";

        if ($b === "")
            $errors["b"] = "b must not be empty.";
        else if (filter_var($b, FILTER_VALIDATE_FLOAT) === false)
            $errors["b"] = "b must be a number";
        else if ($b == 0)
            $errors["b"] = "b cannot be 0";

        if (count($errors) == 0){
            $x = $a / $b;
        }
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
        a = <input type="number" name="a" value="<?= $a ?>">
        <?= $errors["a"] ?? "" ?>
        <br>
        b = <input type="number" name="b" value="<?= $b ?>">
        <?= $errors["b"] ?? "" ?>
        <br>
        <button type="submit">Divide</button>
    </form>

    <?php if ($_GET && count($errors) === 0): ?>
        Result: <?= $x ?>
    <?php endif; ?>
</body>
</html>