<?php
    // Generate HTML from PHP!

    // 1. Write "Hello world" 10 times in
    // increasing font size

    for ($size = 8; $size <= 18; $size++)
        echo "<p style=\"font-size: {$size}px\">Hello world<p>";

    // 2. Write the letters "Hello world" in
    // alternating colours, i.e red-blue-red-blue
    // 2/B. Change the text to something in
    // your native language

    $s = "Helló világ";
    
    for ($i = 0; $i < strlen($s); $i++){ // watch out with loops and non-ASCII characters
        $color = $i % 2 == 0 ? "red" : "blue";
        echo "<span style=\"color: $color\">$s[$i]</span>";
    }

    foreach(mb_str_split($s) as $i => $char){  // use mb_ functions if there is a possibity
        $color = $i % 2 == 0 ? "red" : "blue";
        echo "<span style=\"color: $color\">$char</span>";
    }

?>