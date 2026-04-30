<?php
    $username = mb_strtolower($_POST["username"] ?? "");
    $password1 = $_POST["password1"] ?? "";
    $password2 = $_POST["password2"] ?? "";

    $errors = [];
    if ($_POST){
        $users = json_decode(file_get_contents(__DIR__. "/users.json"), true);
        $match = array_find($users, fn($u) => $u["username"] === $username);
        
        if ($username === "")
            $errors["username"] = "Felhasználónév nem lehet üres.";
        else if ($match !== null)
            $errors["username"] = "Felhasználónév már foglalt!";

        if ($password1 === "")
            $errors["password"] = "Jelszó nem lehet üres.";
        else if ($password1 !== $password2)
            $errors["password"] = "Jelszavak nem egyeznek.";

        if (count($errors) === 0){
            $id = uniqid();
            $users[$id] = [
                "id" => $id,
                "username" => $username,
                "password" => password_hash($password1, PASSWORD_DEFAULT)
            ];
            file_put_contents(__DIR__. "/users.json", json_encode($users, JSON_PRETTY_PRINT));
            header("location: login.php");
            exit();
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
        Felhasználónév: <input type="text" name="username" value="<?= $username ?>">
        <?= $errors["username"] ?? "" ?>
        <br>
        Jelszó: <input type="password" name="password1">
        <?= $errors["password"] ?? "" ?>
        <br>
        Jelszó: <input type="password" name="password2"> <br>
        <button type="submit">Regisztráció</button>
    </form>
</body>
</html>