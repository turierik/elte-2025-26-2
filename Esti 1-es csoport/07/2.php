<?php
    // Generáld ki a "Helló világ" szöveget, 10-szer, egyre nagyobb betűtípussal!
    for ($size = 8; $size <= 18; $size++)
        echo "<p style=\"font-size: {$size}px\">Hello világ</p>";
    
    // 1 db "Helló világ" szöveget generálj, ahol minden 2. betű piros!
    $s = "Helló világ";
    foreach(mb_str_split($s) as $i => $char){
        $color = $i % 2 === 0 ? "blue" : "red";
        echo "<span style=\"color: $color\">$char</span>";
    }
?>