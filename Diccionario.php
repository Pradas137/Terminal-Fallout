<?php
$archivo = fopen('diccionarioNukacola.txt','r');
while ($linea = fgets($archivo)) {
    $aux[] = trim(strtoupper($linea));
}
fclose($archivo);
return $aux;
//print_r($aux);

?>
