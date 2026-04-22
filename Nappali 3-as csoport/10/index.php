<?php
    session_start();
    if (!isset($_SESSION["user_id"])){
        header("location: login.php");
        exit();
    }
    $data = json_decode(file_get_contents(__DIR__ . "/users.json"), true);
    $user = $data[$_SESSION["user_id"]];
?>

<h1>Szia, <?= $user["username"] ?>!</h1>
<a href="logout.php">Kijelentkezés</a>