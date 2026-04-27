<?php
    session_start();

    if (!isset($_SESSION["user_id"])){
        header("location: login.php");
        exit();
    }

    $users = json_decode(file_get_contents(__DIR__ . "/users.json" ), true);
    $user = $users[$_SESSION["user_id"]];
?>

Hello, <?= $user["username"] ?>! <br>
<a href="logout.php">Logout</a>