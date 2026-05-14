<?php
    $nation = $_POST["nation"] ?? "";
    $id = $_POST["id"] ?? "";

    if ($_POST){
        $pdo = new PDO("sqlite:" . __DIR__ . "/../data/db.sqlite");
        $stmt = $pdo -> prepare("UPDATE videos SET nation = :nation WHERE id = :id");
        $stmt -> execute([ "nation" => $nation, "id" => $id ]);
    }
    
    header("location: index.php");
?>