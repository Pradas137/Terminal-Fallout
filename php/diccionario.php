
<?php
    $archivo = fopen('resources/diccionarioFallout.txt','r');
    while ($linea = fgets($archivo)) {
        $palabras[] = trim(strtoupper($linea));
    }
    fclose($archivo);
    return $palabras;
?>
