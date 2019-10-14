<?php
    $file = fopen('./resources/diccionario.txt','r');
    while ($line = fgets($file)) {
        $words[] = trim(strtoupper($line));
    }

    $index = array_rand($words);
    fclose($file);

    $pass = $words[$index];

    echo $pass;

    return $pass;
?>
