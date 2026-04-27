<?php
    session_start();
    $_SESSION["counter"] = ($_SESSION["counter"] ?? 0) + 1;
    echo $_SESSION["counter"] ."<br>";
    echo password_hash("123123123", PASSWORD_DEFAULT);
?>