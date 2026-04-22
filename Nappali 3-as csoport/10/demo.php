<?php
    session_start();
    $x = $_SESSION['x'] ?? 0;
    $_SESSION['x'] = $x + 1;
    echo $_SESSION['x'] . "<br>";
    echo password_hash('kiskutya123', PASSWORD_DEFAULT);
?>
