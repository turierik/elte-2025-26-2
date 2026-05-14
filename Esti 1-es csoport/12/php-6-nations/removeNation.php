<?php
    $id = $_GET["id"] ?? "";

    if ($_GET){
        $data = json_decode(file_get_contents(__DIR__ . "/../data/data_object.json"), true);
        $data[$id]["nation"] = "";
        file_put_contents(__DIR__ . "/../data/data_object.json", json_encode($data, JSON_PRETTY_PRINT));
    }

    header("location: index.php");
?>