<?php
    require_once "nations.php";
    require_once "videos.php";
    
    $pdo = new PDO("sqlite:" . __DIR__ . "/../data/db.sqlite");
    $q = $pdo -> query("SELECT * FROM videos ORDER BY title");
    $data = $q -> fetchAll();

    $noNation = array_filter($data, fn($d) => $d["nation"] === "");
    $hasNation = array_filter($data, fn($d) => $d["nation"] !== "");
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Task 6.</title>
    <link rel="stylesheet" href="index.css" />
</head>

<body>
    <h1>6. Nations</h1>
    <div id="main">
        <div id="form">
            <form action="assignNation.php" method="POST">
                <select name="nation">
                    <?php foreach($nations as $nation): ?>
                        <option value="<?=$nation?>"><?=$nation?></option>
                    <?php endforeach ?>
                </select>
                <select name="id">
                    <?php foreach($noNation as $video): ?>
                        <option value="<?= $video["id"] ?>"><?= $video["title"] ?></option>
                    <?php endforeach ?>
                </select>
                <input type="submit">
            </form>
        </div>
        <div id="videos">
            <div id="left">
                <h2>No nation</h2>
                <?php foreach($noNation as $video): ?>
                    <div><?= $video["title"] ?></div>
                <?php endforeach; ?>
            </div>
            <div id="right">
                <h2>Has nation</h2>
                <?php foreach($hasNation as $video): ?>
                    <div><a href="removeNation.php?id=<?= $video["id"] ?>">🚯</a> <?= $video["title"] ?> | <?= $video["nation"]?></div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>