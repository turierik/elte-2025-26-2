<?php
    $nation = $_POST["nation"] ?? "";
    $id = $_POST["id"] ?? "";
    $data = json_decode(file_get_contents(__DIR__ . "/../data/data_array.json"), true);
    $key = array_find_key($data, fn($d) => $d["id"] == $id);
    $data[$key]["nation"] = $nation;
    file_put_contents(__DIR__ . "/../data/data_array.json", json_encode($data, JSON_PRETTY_PRINT));
    header("location: index.php");
?>