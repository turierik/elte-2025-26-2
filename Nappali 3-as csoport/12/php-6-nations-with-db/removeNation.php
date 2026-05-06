<?php
    $id = $_GET["id"] ?? "";
    $conn = new PDO("sqlite:" . __DIR__ . "/../data/db.sqlite" );
    $stmt = $conn -> prepare("UPDATE videos SET nation = :nation WHERE id = :id");
    $stmt -> execute(["", $id]);
    header("location: index.php");
?>