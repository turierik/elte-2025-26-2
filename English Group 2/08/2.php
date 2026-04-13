<?php
    $name = $_POST["name"] ?? "";
    $email = $_POST["email"] ?? "";
    $cats = $_POST["cats"] ?? "";
    $color = $_POST["color"] ?? "";
    $accept = $_POST["accept"] ?? "";

    $errors = [];
    if ($_POST){
        if ($name === "")
            $errors["name"] = "Name cannot be empty.";
        else if (str_word_count($name) < 2) // alternatives: strpos, count+explode, ...
            $errors["name"] = "Name must have at least 2 words.";

        if ($email === "")
            $errors["email"] = "Email cannot be empty.";
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $errors["email"] = "Invalid email format.";

        if ($cats === "")
            $errors["cats"] = "Cats cannot be empty.";
        else if (filter_var($cats, FILTER_VALIDATE_INT) === false)
            $errors["cats"] = "Cats must be an integer.";
        else if ($cats < 0)
            $errors["cats"] = "Cats cannot be negative.";

        if (!in_array($color, ["red", "green", "blue", "black"]))
            $errors["color"] = "Invalid color.";

        if ($accept != "on")
            $errors["accept"] = "Must be checked.";
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
    <form action="2.php" method="POST">
        Full name: <input type="text" name="name" value="<?= $name ?>">
        <?= $errors["name"] ?? "" ?>
        <br>
        <!-- required, at least 2 words -->
        Email: <input type="text" name="email" value="<?= $email ?>">
        <?= $errors["email"] ?? "" ?>
        <br>
        <!-- required, must be email format -->
        Number of cats: <input type="text" name="cats" value="<?= $cats ?>">
        <?= $errors["email"] ?? "" ?>
        <br>
        <!-- required, integer, not negative -->
        Favorite color: <select name="color">
            <option value="red" <?= $color == "red" ? "selected" : "" ?> >Red</option>
            <option value="green" <?= $color == "green" ? "selected" : "" ?>>Green</option>
            <option value="blue" <?= $color == "blue" ? "selected" : "" ?>>Blue</option>
            <option value="black <?= $color == "black" ? "selected" : "" ?>">Black</option>
        </select>
        <?= $errors["color"] ?? "" ?>
        <br>
        <!-- one of these 4 colors is chosen -->
        <input type="checkbox" name="accept" <?= $accept == "on" ? "selected" : "" ?>> I accept everything.
        <?= $errors["accept"] ?? "" ?>
        <!-- must be checked -->
        <br>
        <button type="submit">Submit form</button>
    </form>
</body>
</html>