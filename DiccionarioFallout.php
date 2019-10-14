<?php
$archivo = fopen('diccionarioFallout.txt','r');
while ($linea = fgets($archivo)) {
    $aux[] = trim($linea);
}
fclose($archivo);
print_r($aux);
?>

