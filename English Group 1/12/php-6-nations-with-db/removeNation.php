<?php
    $id = $_GET["id"] ?? "";

    if ($_GET){
        $pdo = new PDO("sqlite:" . __DIR__ . "/../data/db.sqlite");
        $stmt = $pdo -> prepare("UPDATE videos SET nation = :nation WHERE id = :id");
        $stmt -> execute([ "nation" => "", "id" => $id ]);
    }

    header("location: index.php");
?>