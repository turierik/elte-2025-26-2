<?php
    $filter = $_GET["filter"] ?? "";
    $pdo = new PDO("sqlite:" . __DIR__ . "/../data/db.sqlite");
    $query = $pdo -> prepare("SELECT * FROM videos WHERE title LIKE :filter ORDER BY title");
    $query -> execute(["filter" => "%$filter%"]);
    $data = $query -> fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data);
?>