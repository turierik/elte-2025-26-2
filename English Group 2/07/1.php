Whatever is not in PHP tags

<?php
    $x = 5;  // all variables must begin with $ and ; is needed
    echo $x;
    echo($x);
    print $x;
    print($x);

    $t = [2, 3, 4];
    // echo $t; <--- don't do this
    // JS join  --> PHP implode
    // JS split --> PHP explode
    echo "<br>";
    echo implode(", ", $t);

    // JS objects --> PHP associative arrays
    $car = [
        "year"   => 2024,
        "model"  => "Tesla Model M",
        "broken" => true
    ];
    echo "<br>";
    echo $car["year"]; // assoc array!!!

    // object of type stdClass is also possible
    $car2 = (object)[
        "year"   => 2024,
        "model"  => "Tesla Model M",
        "broken" => true
    ];
    echo "<br>";
    echo $car2 -> year; // object!!

    foreach($car as $key => $value){
        echo '<br>The value of $key is $value.'; // no substitution for '' strings 
        echo "<br>The value of $key is {$value}s."; // substitution works only with "" strings
        // warning about booleans... true = 1, false = empty string!!!
    }
    echo "<br>";
    echo "6" + "4";
    echo "<br>";
    echo "6" . "4";
?>

will be displayed as simple text.