<?php
    $t = [4, -3, 0, 1, 6, 7, -3, 2];

    // 1. Írasd ki a páros számokat!
    $evens = array_filter($t, fn($x) => $x % 2 === 0); // VIGYÁZZ! Indexeket megtartja!
    echo implode(", ", $evens) . "<br>";    

    // 2. Írd ki minden szám négyzetét!
    $square = array_map(fn($x) => $x * $x, $t);
    echo implode(", ", $square) . "<br>";

    // 3. Hány negatív szám van?
    $negs = array_filter($t, fn($x) => $x < 0);
    echo count($negs) . "<br>";

    // 4. Mennyi a számok összege?
    echo array_sum($t) . "<br>";

    // 5. Melyik a legnagyobb szám?
    echo max($t) . "<br>";

    // 6. Találd meg az első negatív számot!
    $neg1 = array_find($t, fn($x) => $x < 0);
    echo $neg1 . "<br>";

    // 7. Van-e prímszám a tömbben? (isPrime függvény megírandó)
    function isPrime($num) { // ChatGPT :)
        if ($num <= 1) {
            return false;
        }
        if ($num <= 3) {
            return true;
        }
        if ($num % 2 === 0 || $num % 3 === 0) {
            return false;
        }
        for ($i = 5; $i * $i <= $num; $i += 6) {
            if ($num % $i === 0 || $num % ($i + 2) === 0) {
                return false;
            }
        }
        return true;
    }
    echo array_any($t, 'isPrime') ? "Van." : "Nincs.";
?>