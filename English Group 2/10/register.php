<?php
    $username = mb_strtolower($_POST["username"] ?? "");
    $password1 = $_POST["password1"] ?? "";
    $password2 = $_POST["password2"] ?? "";

    $errors = [];

    if ($_POST){
        $users = json_decode(file_get_contents(__DIR__ . "/users.json"), true);
        $user = array_find($users, fn($u) => $username === $u["username"]);
        
        if ($username === "")
            $errors["username"] = "Username cannot be empty.";
        else if ($user !== null)
            $errors["username"] = "Username is taken.";

        if ($password1 === "")
            $errors["password"] = "Password cannot be empty.";
        else if ($password1 !== $password2)
            $errors["password"] = "Password must match.";
        
        if (count($errors) === 0){
            $id = uniqid();
            $users[$id] = [
                "id" => $id,
                "username" => $username,
                "password" => password_hash($password1, PASSWORD_DEFAULT)
            ];
            file_put_contents(__DIR__ . "/users.json", json_encode($users, JSON_PRETTY_PRINT));
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
    <form action="register.php" method="post">
        Username: <input type="text" name="username" value="<?= $username ?>" >
        <?= $errors["username"] ?? "" ?> <br>
        Password: <input type="password" name="password1">
        <?= $errors["password"] ?? "" ?> <br>
        Password: <input type="password" name="password2"> <br>
        <button type="submit">Register</button>
    </form>
</body>
</html>