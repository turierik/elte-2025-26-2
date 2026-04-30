<?php
    session_start();
    $counter = $_SESSION["counter"] ?? 0;
    $counter++;
    $_SESSION["counter"] = $counter;
    echo $counter . "<br>";
    echo password_hash("12345678", PASSWORD_DEFAULT);
?>