<?php
    $filter = $_GET["filter"] ?? "";
    $data = json_decode(file_get_contents(__DIR__ . "/../data/data_array.json"), true);
    usort($data, fn($a, $b) => strcmp($a["title"], $b["title"]));
    if ($filter === "")
        echo json_encode($data);
    else 
        echo json_encode(array_filter($data, fn($d) => str_contains($d["title"], $filter)));
?>