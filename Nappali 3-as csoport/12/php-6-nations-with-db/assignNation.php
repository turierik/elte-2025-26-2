<?php
    $nation = $_POST["nation"] ?? "";
    $id = $_POST["id"] ?? "";
    $conn = new PDO("sqlite:" . __DIR__ . "/../data/db.sqlite" );
    $stmt = $conn -> prepare("UPDATE videos SET nation = :nation WHERE id = :id");
    $stmt -> execute([$nation, $id]);
    header("location: index.php");
?>