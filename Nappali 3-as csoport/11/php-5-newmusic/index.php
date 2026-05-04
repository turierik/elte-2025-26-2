<?php
    include_once(__DIR__ . "/../data/data_array_of_arrays.php");

    $title = $_POST["title"] ?? "";
    $year = $_POST["year"] ?? "";
    $views = $_POST["views"] ?? "";
    $manualid = $_POST["manualid"] ?? "";
    $id = $_POST["id"] ?? "";

    $errors = [];
    if ($_POST){
        if ($title === "")
            $errors["title"] = "Cím kitöltése kötelező!";
        else if (mb_strlen($title) < 5)
            $errors["title"] = "Cím legalább 5 karakter kell legyen!"; 
        else if (!str_contains($title, " - "))
            $errors["title"] = "Cím tartalmazzon szóköz-kötőjel-szóköz részt!"; 

        if ($year === "")
            $errors["year"] = "Év kitöltése kötelező!";
        else if (filter_var($year, FILTER_VALIDATE_INT) === false)
            $errors["year"] = "Év egész szám legyen!";
        else if ($year < 1956)
            $errors["year"] = "Év nem lehet kisebb mint 1956!";

        if ($views === "")
            $errors["views"] = "Megtekintések kitöltése kötelező!";
        else if (filter_var($views, FILTER_VALIDATE_FLOAT) === false)
            $errors["views"] = "Nézettség szám legyen!";
        else if ($views < 0.01)
            $errors["views"] = "Nézettség nem lehet kisebb mint 0.01!";

        if ($manualid === "")
            $errors["manualid"] = "Kézi ID kitöltése kötelező!";
        else if ($manualid !== "yes" && $manualid !== "no")
            $errors["manualid"] = "Kézi ID értéke csak yes vagy no lehet!";

        if ($manualid === "yes"){
            if ($id === "")
                $errors["id"] = "ID kitöltése kötelező!";
            else if (in_array($id, array_column($data, "id")))
                $errors["id"] = "Ez az ID már foglalt!";
            else if (!array_all(str_split($id), fn($c) => (($c >= '0' && $c <= '9') || ($c >= 'a' && $c <= 'f'))))
                $errors["id"] = "Az ID csak hexa kód lehet!";
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