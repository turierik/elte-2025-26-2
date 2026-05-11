<?php
    $id = $_GET["id"] ?? "";

    if ($_GET){
        $data = json_decode(file_get_contents(__DIR__ . "/../data/data_array.json"), true);
        $key = array_find_key($data, fn($d) => $d["id"] === $id);
        $data[$key]["nation"] = "";
        file_put_contents(__DIR__ . "/../data/data_array.json", json_encode($data, JSON_PRETTY_PRINT));
    }

    header("location: index.php");
?>