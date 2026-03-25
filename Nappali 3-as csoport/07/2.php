<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Írd ki 10x, hogy hello world,
     egyre nagyobb betűmérettel. -->
    <!-- Írd ki, hogy hello world úgy,
     hogy kék-piros-kék-piros karakterenként. -->

    <?php
        for ($size = 6; $size < 16; $size++)
            echo "<p style=\"font-size: {$size}px\">Hello world</p>";
        
        $s = "Árvíztűrő tükörfúrógép";

        foreach(mb_str_split($s) as $i => $char){
            if ($i % 2 === 0)
                echo "<span style=\"color: red\">$char</span>";
            else
                echo "<span style=\"color: blue\">$char</span>";
        }
    ?>

   
</body>
</html>