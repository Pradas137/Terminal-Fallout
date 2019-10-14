
<?php
    $archivo = fopen('resources/diccionario.txt','r');
    while ($linea = fgets($archivo)) {
        $palabras[] = trim(strtoupper($linea));
    }
    fclose($archivo);
    return $palabras;
?>
