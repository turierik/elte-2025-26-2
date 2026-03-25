<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $x = 5;
        echo $x;
        echo($x);
        print $x;
        print($x);

        $t = [8, 4, 2, 0];
        echo $t;
        for ($i = 0; $i < count($t); $i++)
            echo $t[$i];
        foreach($t as $elem)
            echo $elem;
        echo "<br>";
        echo implode(", ", $t);
        
        $car = [
            "model"  => "Tesla Model M",
            "year"   => 2024,
            "broken" => false
        ];
        echo $car["model"];

        $car2 = (object)[
            "model"  => "Tesla Model M",
            "year"   => 2024,
            "broken" => false
        ];
        echo $car2 -> model;

        echo "<br>";
        echo "4" + "2";
        echo "<br>";
        echo "4" . "2";

        echo "<br>";
        echo "true = " . true;
        echo "<br>";
        echo "false = " . false;

        echo "<br>";
        echo 'x értéke: $x'; // nem helyettesít be
        echo "<br>";
        echo "x értéke: $x"; // behelyettesít
    ?>
</body>
</html>