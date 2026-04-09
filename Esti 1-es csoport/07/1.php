Amit ide írok
<?php
    $x = 5;
    echo $x;
    echo($x);
    print $x;
    print($x);

    $t = [6, 4, 2, 0];
    // echo $t; // ne!

    for($i = 0; $i < count($t); $i++)
        echo $t[$i];

    foreach($t as $elem)
        echo $elem;

    echo "<br>";
    foreach($t as $index => $elem)
        echo $index . " => " . $elem . "<br>";

    // JS split -> PHP explode
    // JS join  -> PHP implode

    echo implode(", ", $t);

    $car = [   // asszociatív tömb ~ JS object
        "model"  => "Tesla Model M",
        "year"   => 2024,
        "broken" => true
    ];
    echo $car["year"];
    echo "<br>";
    foreach($car as $index => $elem)
        echo "{$index}nek értéke $elem<br>"; // dupla idézőjel = behelyettesítés

    $car2 = (object)[ // ez igy igazi, OOP-s objektum, stdClass
        "model"  => "Tesla Model M",
        "year"   => 2024,
        "broken" => true
    ];
    echo $car2 -> year;

?>
az simán szövegként megjelenik.