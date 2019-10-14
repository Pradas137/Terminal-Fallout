
<?php
$claves = array_rand($aux);
$aux[$claves]."\n";

require 'diccionario.php';
$pass = $aux[$claves];
echo "$pass"
?>
