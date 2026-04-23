<?php
    $name = $_POST["name"] ?? "";
    $email = $_POST["email"] ?? "";
    $cats = $_POST["cats"] ?? "";
    $color = $_POST["color"] ?? "";
    $accept = $_POST["accept"] ?? "";

    $errors = [];
    if ($_POST){
        if ($name == "")
            $errors["name"] = "A név megadása kötelező!";
        else if (str_word_count($name) < 2)
            $errors["name"] = "A név legalább két szó!";

        if ($email == "")
            $errors["email"] = "Az email megadása kötelező!";
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $errors["email"] = "Érvénytelen email!";

        if ($cats == "")
            $errors["cats"] = "A macskák száma kötelező!";
        else if (filter_var($cats, FILTER_VALIDATE_INT) === false)
            $errors["cats"] = "A macskák száma egész szám legyen!";
        else if ($cats < 0)
            $errors["cats"] = "A macskák száma nem lehet negatív!";

        if (!in_array($color, ["red", "green", "blue"]))
            $errors["color"] = "Érvénytelen szín!";

        if ($accept != "on")
            $errors["accept"] = "Be kell pipálni!";
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
    <form action="2.php" method="POST" novalidate>
        Teljes név: <input type="text" name="name" value="<?= $name ?>">
        <?= $errors["name"] ?? "" ?><br>
        <!-- nem üres, legalább 2 szó -->

        E-mail: <input type="text" name="email" value="<?= $email ?>">
        <?= $errors["email"] ?? "" ?><br>
        <!-- nem üres, helyes email formátumú -->

        Macskák száma: <input type="text" name="cats" value="<?= $cats ?>">
        <?= $errors["cats"] ?? "" ?>
        <br>
        <!-- nem üres, egész szám, nem-negativ -->

        Kedvenc színed: <select name="color">
            <option value="red" <?= $color == "red" ? "selected" : "" ?>  >red</option>
            <option value="green" <?= $color == "green" ? "selected" : "" ?>>green</option>
            <option value="blue" <?= $color == "blue" ? "selected" : "" ?>>blue</option>
        </select>
        <?= $errors["color"] ?? "" ?> <br>
        <!-- csak ez a 3 szín egyike lehet -->
        
        <input type="checkbox" name="accept" <?= $accept == "on" ? "checked" : "" ?>>Elfogadom a mindent. <?= $errors["accept"] ?? "" ?>
        <!-- muszáj bejelölni -->

        <br>
        <button type="submit">Mentés</button>
    </form>
</body>
</html>