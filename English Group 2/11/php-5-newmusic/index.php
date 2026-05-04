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
            $errors["title"] = "Title is required.";
        else if (strlen($title) < 5)
            $errors["title"] = "Title must have at least 5 char.";
        else if (!str_contains($title, " - "))
            $errors["title"] = "Title must contain space-dash-space.";

        if ($year === "")
            $errors["year"] = "Year is required.";
        else if (filter_var($year, FILTER_VALIDATE_INT) === false)
            $errors["year"] = "Year must be an integer.";
        else if ($year < 1956)
            $errors["year"] = "Year must be at least 1956.";

        if ($views === "")
            $errors["views"] = "Views is required.";
        else if (filter_var($views, FILTER_VALIDATE_FLOAT) === false)
            $errors["views"] = "Views must be a number.";
        else if ($views < 0.01)
            $errors["views"] = "Views must be at least 0.01.";

        if ($manualid === "")
            $errors["manualid"] = "Manual ID is required.";
        else if ($manualid != "yes" && $manualid != "no")
            $errors["manualid"] = "Manual ID must be yes or no.";

        if ($manualid === "yes"){
            if ($id === "")
                $errors["id"] = "ID is required.";
            else if (in_array($id, array_column($data, "id")))
                $errors["id"] = "ID must be unique!";
            else if (!array_all(str_split($id), fn($c) => ($c >= "0" && $c <= "9") || ($c >= "a" && $c <= "f")))
                $errors["id"] = "ID must be a valid hex!"; 
        }
    }
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Task 5.</title>
    <link rel="stylesheet" href="index.css" />
</head>

<body>
    <h1>5. New music</h1>
    <div id="main">
        <form method="POST" action="index.php">
            <label>
                Title
                <input name="title" value="<?= $title ?>">
            </label>
            <label>
                Release year
                <input name="year" value="<?= $year ?>">
            </label>
            <label>
                Views
                <input name="views" value="<?= $views ?>">
            </label>
            <div>
                Manual ID
                <label><input type="radio" name="manualid" value="yes"
                <?= $manualid === "yes" ? "checked" : "" ?>> Igen</label>
                <label><input type="radio" name="manualid" value="no"
                <?= $manualid === "no" ? "checked" : "" ?>> Nem</label>
            </div>
            <label>
                ID
                <input name="id" value="<?= $id ?>">
            </label>
            <input type="submit">
        </form>

        <?php if(count($errors) === 0 && $_POST): ?>
            <div id="success">New song added!</div>
        <?php endif; ?>
        
        <?php if (count($errors) > 0): ?>
        <div id="errors">
            Error!
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