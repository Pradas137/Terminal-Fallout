
<?php
$claves = array_rand($aux);
$aux[$claves]."\n";

require 'DiccionarioFallout.php';
$pass = $aux[$claves];
echo "<input type='hidden' id='password' value=\"$pass\">"
?>
