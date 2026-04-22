<?php
    $user = mb_strtolower(trim($_POST["user"] ?? ""));
    $pass1 = trim($_POST["pass1"] ?? "");
    $pass2 = trim($_POST["pass2"] ?? "");
    $errors = [];
    if ($_POST){
        $data = json_decode(file_get_contents(__DIR__ . "/users.json"), true);

        if ($user === "")
            $errors["user"] = "Username cannot be empty!";
        else if (array_find($data, fn($u) => $u["username"] === $user) !== null)
            $errors["user"] = "Username already taken!";

        if (mb_strlen($pass1) < 8)
            $errors["pass1"] = "Password must have at least 8 characters!";

        if ($pass1 != $pass2)
            $errors["pass2"] = "Passwords must match!";

        if (count($errors) == 0){
            $id = uniqid();
            $data[$id] = [
                "id" => $id,
                "username" => $user,
                "password" => password_hash($pass1, PASSWORD_DEFAULT)
            ];
            file_put_contents(__DIR__ . "/users.json", json_encode($data, JSON_PRETTY_PRINT));
            header("location: login.php");
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
    <form action="register.php" method="POST">
        Username: <input type="text" name="user" value="<?= $user ?>">
        <?= $errors["user"] ?? ""?>
        <br>
        Password: <input type="password" name="pass1">
        <?= $errors["pass1"] ?? ""?><br>

        Password: <input type="password" name="pass2">
        <?= $errors["pass2"] ?? ""?><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>