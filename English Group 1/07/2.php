<?php
    // Generate some HTML code from PHP!

    // 1. Write "Hello world" 10 times
    // in different font sizes

    for ($size = 8; $size <= 18; $size++)
        echo "<p style=\"font-size: {$size}px\">Hello world</p>";

    // 2. Write the letters of
    // "Hello world" in red-blue-red-blue
    // colors.

    $hello = "Hello world";
    for ($i = 0; $i < strlen($hello); $i++){ // be careful with non-English strings and loops!
        $color = $i % 2 === 0 ? "red" : "blue";
        echo "<span style=\"color: $color \">$hello[$i]</span>";
    }
?>