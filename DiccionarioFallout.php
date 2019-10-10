<!DOCTYPE html>
<html>
<head>
<?php
$archivo = fopen('DiccionarioFallout.txt','r');
while ($linea = fgets($archivo)) {
    $aux[] = $linea;
    $numlinea++;
}
fclose($archivo);
echo '<pre>';
print_r($aux);
echo '</pre>';
?>



</head>
<body>


</body>
</html>




