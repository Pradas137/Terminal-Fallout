<?php
$archivo = fopen('DiccionarioFallout.txt','r');
while ($linea = fgets($archivo)) {
    $aux[] = $linea;
}
fclose($archivo);
return $aux;
?>
