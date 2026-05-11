<?php
    $filter = $_GET["filter"] ?? "";
    $pdo = new PDO("sqlite:" . __DIR__ . "/../data/db.sqlite");
    $stmt = $pdo -> prepare("SELECT * FROM videos WHERE title LIKE :filter ORDER BY title");
    $stmt -> execute(["filter" => "%$filter%"]);
    $data = $stmt -> fetchAll();
    echo json_encode($data, JSON_PRETTY_PRINT);
?>