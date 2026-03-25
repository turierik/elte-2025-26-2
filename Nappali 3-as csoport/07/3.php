<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $t = [9, -5, 7, 0, 2, -4, 6];
        // 1. Válogasd ki és írd ki a negatív számokat!

        $neg = array_filter($t, fn($x) => $x < 0);
        echo implode(", ", $neg) . "<br>";

        // 2. Írd ki minden szám négyzetét!

        $sq = array_map(fn($x) => $x * $x, $t);
        echo implode(", ", $sq) . "<br>";

        // 3. Hány páros szám van a tömbben?
        $evens = array_filter($t, fn($x) => !($x & 1));
        echo count($evens) . "<br>";

        // 4. Melyik a legkisebb szám?
        echo min($t) . "<br>";

        // 5. Mennyi a számok összege?
        echo array_sum($t) . "<br>";

        // 6. Van-e prímszám a tömbben? (boolean!)
        echo array_any($t, "is_prime") ? "Van." : "Nincs.";
        function is_prime($n) { // Thanks to GPT!
            // Handle small cases
            if ($n < 2) return false;
            if ($n === 2 || $n === 3) return true;
            // Eliminate even numbers and multiples of 3
            if ($n % 2 === 0 || $n % 3 === 0) return false;
            // Check factors up to sqrt(n) using 6k ± 1 optimization
            for ($i = 5; $i * $i <= $n; $i += 6) {
                if ($n % $i === 0 || $n % ($i + 2) === 0) {
                    return false;
                }
            }
            return true;
        }
    ?>
</body>
</html>