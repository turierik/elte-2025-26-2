<?php
    session_start();
    $username = mb_strtolower($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    $errors = [];
    if ($_POST){
        $users = json_decode(file_get_contents(__DIR__ . "/users.json" ), true);
        $user = array_find($users, fn($u) => $u["username"] === $username && password_verify($password, $u["password"]));

        if ($user === null)
            $errors["login"] = "Username and/or password incorrect.";

        if (count($errors) === 0){
            $_SESSION["user_id"] = $user["id"];
            header("location: index.php");
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
    <form action="login.php" method="post">
        <?= $errors["login"] ?? "" ?> <br>
        Username: <input type="text" name="username" value="<?= $username ?>"><br>
        Password: <input type="password" name="password"><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>