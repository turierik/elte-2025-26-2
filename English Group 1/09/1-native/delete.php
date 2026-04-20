<?php
    $id = $_GET["id"] ?? -1;
    $data = json_decode(file_get_contents(__DIR__ . "/../data.json"), true);
    unset($data[$id]);
    file_put_contents(__DIR__ . "/data.json", json_encode($data, JSON_PRETTY_PRINT));
    header("location: index.php");
    exit();
?>