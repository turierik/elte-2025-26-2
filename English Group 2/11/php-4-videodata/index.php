<?php
    require_once(__DIR__ . "/../data/data_array_of_arrays.php");
    function popularity($views){
        if ($views < 10) return "partially-popular";
        if ($views < 100) return "slightly-popular";
        return "very-popular";
    }
    usort($data, fn($a, $b) => strcmp($a["title"], $b["title"]));
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Task 4.</title>
    <link rel="stylesheet" href="index.css" />
</head>

<body>
    <h1>4. Videos</h1>
    <div id="main">
        <?php foreach($data as $d): ?>
        <a class="card <?= popularity($d["views"]) ?>" href="https://www.youtube.com/watch?v=<?= $d["yt"] ?>" target="_blank">
            <img src="img/<?= $d["id"] ?>.jpg">
            <h2><?= $d["title"] ?></h2>
            <span class="year"><?= $d["year"] ?></span>
            <span class="views"><?= $d["views"] ?> million</span>
        </a>
        <?php endforeach; ?>

    </div>
</body>

</html>