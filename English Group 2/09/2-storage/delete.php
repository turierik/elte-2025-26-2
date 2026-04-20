<?php
    $id = $_GET["id"] ?? -1;
    include_once("Storage.php");
    $stor = new Storage(new JsonIO(__DIR__ . "/../data.json"));
    $stor -> delete($id);
    header("location: index.php");
    exit();
?>