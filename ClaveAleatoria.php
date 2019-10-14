<?php
$archivo = fopen('diccionarioNukacola.txt','r');
while ($linea = fgets($archivo)) {
    $aux[] = trim($linea);
}
fclose($archivo);
//print_r($aux);
?>

<?php

function array_random_assoc($arr, $num = 1) {
    $keys = array_keys($arr);
    shuffle($keys);
   
    $r = array();
    for ($i = 0; $i < $num; $i++) {
        $r[$keys[$i]] = $arr[$keys[$i]];
    }
    return $r;
}

print_r(array_random_assoc($aux));


?>


