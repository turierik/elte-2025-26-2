<?php
    $w = [9, 6, -2, 0, 4, 1, 3, -5, 7];

    // 1. Create a new array that only contains
    // the even numbers from $w and output it

    $evens = array_filter($w, fn($x) => $x % 2 === 0);
    // side note: array_filter KEEPS THE ORININAL INDEXES!!!
    echo implode(", ", $evens) . "<br>";

    // 2. Square all the numbers in $w
    $sq = array_map(fn($x) => $x * $x, $w);
    echo implode(", ", $sq) . "<br>";

    // 3. Count the negative numbers in $w
    $negs = array_filter($w, fn($x) => $x < 0);
    echo count($negs) . "<br>";

    // 4. Calculate the sum of the numbers in $w
    echo array_sum($w) . "<br>";

    // 5. Find me the first negative number in $w
    echo array_find($w, fn($x) => $x < 0) . "<br>";

    // 6. Find me the largest number in $w
    echo max($w) . "<br>";

    // 7. Is there any negative number in $w? (yes/no)
    echo array_any($w, fn($x) => $x < 0) ? "yes" : "no";
?>