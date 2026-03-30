<?php
    $w = [9, -6, 0, 7, 3, 4, 6, 3];

    // 1. Create a new array and write it in the document
    // that contains the even numbers from $w.
    $evens = array_filter($w, fn($x) => $x % 2 === 0);
    // side note: array_filter keeps the orignal indexes
    echo implode(", ", $evens) . "<br>";

    // 2. Square all the numbers in $w.
    $sq = array_map(fn($x) => $x * $x, $w);
    echo implode(", ", $sq) . "<br>";

    // 3. Find the first negative number in $w.
    $neg = array_find($w, fn($x) => $x < 0);
    echo $neg . "<br>";

    // 4. Calculate the sum of $w.
    echo array_sum($w) . "<br>";

    // 5. Is there an even number in $w. (yes/no)
    echo (array_any($w, fn($x) => $x % 2 === 0) ? "yes" : "no") . "<br>";

    // 6. Find the largest number in $w.
    echo max($w) . "<br>";

    // 7. Count the 3s in $w.
    echo count(array_filter($w, fn($x) => $x == 3));
    
?>