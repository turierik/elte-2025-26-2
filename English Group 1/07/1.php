Anything that is not in a PHP tag

<?php
    $x = 5; // all variables start with $ and ; in always needed
    echo $x;
    echo($x);
    print $x;
    print($x);

    $t = [9, 5, 0, -2, 6];
    // echo $t; // don't do this, it will just give a warning and "Array"
    echo implode(", ", $t);
    // PHP implode ~ JS join
    // PHP explode ~ JS split

    // JS objects are also array in PHP - [ ] !!!
    $car = [
        "year"   => 2026,
        "model"  => "Tesla Model M",
        "broken" => true
    ];
    echo "<br>"; // if viewed on a browser, use <br> for newline
    echo $car["year"];

    // real objects in PHP - stdClass
    $car2 = (object)[
        "year"   => 2026,
        "model"  => "Tesla Model M",
        "broken" => false
    ];
    echo $car2 -> year;
    
    // dot in PHP - string concatenation
    echo "<br>";
    echo "6" + "4";
    echo "<br>";
    echo "6" . "4";

    foreach($car as $key => $value){
        echo '<br>The value of $key is $values.'; // no substitution on '' strings
        echo "<br>The value of $key is {$value}s."; // variable substitution "" only
        // false = empty string
        // true = 1
    }
?>

will be displayed as simple text.