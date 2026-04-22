<?php
    session_start();
    $user = mb_strtolower(trim($_POST["user"] ?? ""));
    $pass = trim($_POST["pass"] ?? "");
    $errors = [];
    if ($_POST){
        $data = json_decode(file_get_contents(__DIR__ . "/users.json"), true);

        if ($user === "")
            $errors["user"] = "Username cannot be empty!";

        if ($pass === "")
            $errors["pass"] = "Password cannot be empty!";

        if (count($errors) == 0){
            $found = array_find($data,
                fn($u) => $u["username"] === $user && password_verify($pass, $u["password"])
            );

            if (!$found){
                $errors["login"] = "Username and/or password incorrect!";
            } else {
                $_SESSION["user_id"] = $found["id"];
                header("location: index.php");
            }
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
        <?= $errors["login"] ?? "" ?><br>

        Username: <input type="text" name="user" value="<?= $user ?>">
        <?= $errors["user"] ?? ""?>
        <br>
        Password: <input type="password" name="pass">
        <?= $errors["pass"] ?? ""?><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>