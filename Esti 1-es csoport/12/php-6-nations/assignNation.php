<?php
    $nation = $_POST["nation"] ?? "";
    $id = $_POST["id"] ?? "";

    if ($_POST){
        $data = json_decode(file_get_contents(__DIR__ . "/../data/data_object.json"), true);
        $data[$id]["nation"] = $nation;
        file_put_contents(__DIR__ . "/../data/data_object.json", json_encode($data, JSON_PRETTY_PRINT));
    }

    header("location: index.php");
?>