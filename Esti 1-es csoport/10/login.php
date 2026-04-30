<?php
    session_start();

    if (isset($_SESSION["user_id"])){
        header("location: index.php");
        exit();
    }

    $username = mb_strtolower($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    $errors = [];
    if ($_POST){
        if ($username === "")
            $errors["username"] = "Felhasználónév nem lehet üres.";

        if ($password === "")
            $errors["password"] = "Jelszó nem lehet üres.";

        $users = json_decode(file_get_contents(__DIR__. "/users.json"), true);
        $match = array_find($users,
            fn($u) => $u["username"] === $username && password_verify($password, $u["password"])
        );

        if ($match === null)
            $errors["login"] = "Felhasználónév és/vagy jelszó helytelen!";

        if (count($errors) === 0){
            $_SESSION["user_id"] = $match["id"];
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
    <form action="login.php" method="POST">
        <?= $errors["login"] ?? "" ?> <br>
        Felhasználónév: <input type="text" name="username" value="<?= $username ?>">
        <?= $errors["username"] ?? "" ?>
        <br>
        Jelszó: <input type="password" name="password">
        <?= $errors["password"] ?? "" ?>
        <br>
        <button type="submit">Bejelentkezés</button>
    </form>
</body>
</html>