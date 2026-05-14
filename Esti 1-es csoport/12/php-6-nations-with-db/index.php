<?php
    require_once "nations.php"; 
    
    $pdo = new PDO("sqlite:" . __DIR__ . "/../data/db.sqlite");
    $query = $pdo -> query("SELECT * FROM videos ORDER BY title");
    $data = $query -> fetchAll();

    $noNation = array_filter($data, fn($d) => $d["nation"] === "");
    $hasNation = array_filter($data, fn($d) => $d["nation"] !== "");
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>6. feladat</title>
    <link rel="stylesheet" href="index.css" />
</head>

<body>
    <h1>6. Országok</h1>
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
                <h2>Nincs országa</h2>
                <?php foreach($noNation as $v): ?>
                    <div><?= $v["title"] ?></div>
                <?php endforeach; ?>
            </div>
            <div id="right">
                <h2>Országhoz rendelve</h2>
                <?php foreach($hasNation as $v): ?>
                    <div><a href="removeNation.php?id=<?= $v["id"] ?>">🚯</a> <?= $v["title"] ?> | <?= $v["nation"] ?></div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>