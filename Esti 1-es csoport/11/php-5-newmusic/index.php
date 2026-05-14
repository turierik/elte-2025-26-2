<?php
    require_once(__DIR__ . "/../data/data_array_of_arrays.php");

    $title = $_POST["title"] ?? "";
    $year = $_POST["year"] ?? "";
    $views = $_POST["views"] ?? "";
    $manualid = $_POST["manualid"] ?? "";
    $id = $_POST["id"] ?? "";

    $errors = [];
    if ($_POST){
        if ($title === "")
            $errors["title"] = "Cím megadása kötelező!";
        else if (mb_strlen($title) < 5)
            $errors["title"] = "Cím legyen legalább 5 karakter!";
        else if (!str_contains($title, " - "))
            $errors["title"] = "A cím tartalmazzon szókoz-kötőjel-szóköz részt!";

        if ($year === "")
            $errors["year"] = "Év megadása kötelező!";
        else if (filter_var($year, FILTER_VALIDATE_INT) === false)
            $errors["year"] = "Év egész szám kell legyen!";
        else if ($year < 1956)
            $errors["year"] = "Év legalább 1956 legyen!";
        
        if ($views === "")
            $errors["views"] = "Megtekintések megadása kötelező!";
        else if (filter_var($views, FILTER_VALIDATE_FLOAT) === false)
            $errors["views"] = "Megtekintések szám kell legyen!";
        else if ($views < 0.01)
            $errors["views"] = "Megtekintések legalább 0.01 legyen!";

        if ($manualid === "")
            $errors["manualid"] = "Kézi ID megadása kötelező!";
        else if ($manualid != "yes" && $manualid != "no")
            $errors["manualid"] = "Kézi ID csak yes vagy no lehet!";

        if ($manualid === "yes"){
            if ($id === "")
                $errors["id"] = "ID megadása kötelező!";
            else if (in_array($id, array_column($data, "id")))
                $errors["id"] = "ID már foglalt!";
            else if (!array_all(str_split($id), fn($c) => ($c >= '0' && $c <= '9') || ($c >= 'a' && $c <= 'f')))
                $errors["id"] = "ID hexa kód legyen!";
        }
    }
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>5. feladat</title>
    <link rel="stylesheet" href="index.css" />
</head>

<body>
    <h1>5. Új zeneszám</h1>
    <div id="main">
        <form action="index.php" method="POST">
            <label>
                Cím
                <input name="title" value="<?= $title ?>">
            </label>
            <label>
                Megjelenés éve
                <input name="year" value="<?= $year ?>">
            </label>
            <label>
                Nézettség
                <input name="views" value="<?= $views ?>">
            </label>
            <div>
                Kézi ID
                <label><input type="radio" name="manualid" value="yes" <?= $manualid === "yes" ? "checked" : "" ?>> Igen</label>
                <label><input type="radio" name="manualid" value="no" <?= $manualid === "no" ? "checked" : "" ?>> Nem</label>
            </div>
            <label>
                ID
                <input name="id" value="<?= $id ?>">
            </label>
            <input type="submit">
        </form>

        <?php if(count($errors) === 0 && $_POST): ?>
            <div id="success">Új zeneszám hozzáadva!</div>
        <?php endif; ?>
        
        <?php if (count($errors) > 0): ?>
        <div id="errors">
            Hiba!
            <ul>
                <?php foreach($errors as $e): ?>
                    <li><?= $e ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

    </div>
</body>

</html>