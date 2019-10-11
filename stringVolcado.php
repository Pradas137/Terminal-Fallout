<!-- 12 caracteres 17 filas 2 columnas
6 palabras 5 caracteres
408 caracteres
378 Simbolos 30 caracteres de string -->

<?php
    define("CHAR_TOTAL",408);
    $arrayPalabras=["PALA1","PALA2","PALA3","PALA4","PALA5","PALA6"];
    $arraySimbolos=["<",">",",","`","!","@","#","$","%","^","&","*","(",")","?","\\","|","/",":",";","+","[","]", "=", "{", "}"];
    $copyArrayPalabras = $arrayPalabras;
    $arrayPosicionesPalabras=[];

    while (count($arrayPosicionesPalabras) < 6) {
        $randomNum = rand(0,(CHAR_TOTAL-5));
        $aux = 0;
        foreach($arrayPosicionesPalabras as $posicionRandom){
            // echo "<script>console.log(\"$posicionRandom\")</script>";
            if($randomNum <  ($posicionRandom + 7) and $randomNum > ($posicionRandom - 7)) {
                $aux++;
            }
        }
        if ($aux == 0) {
            array_push($arrayPosicionesPalabras,$randomNum);
        }
    }

    $stringVolcado="";
    while (strlen($stringVolcado) < CHAR_TOTAL) {
        $posAux = strlen($stringVolcado);
        if (in_array($posAux,$arrayPosicionesPalabras)){
            echo "<script>console.log('en while-if')</script>";
            $aux = array_shift($arrayPalabras);
            echo "<script>console.log('$aux')</script>";
            $stringVolcado .= $aux;
        }else{
            $auxPosSimbolos = rand(0,count($arraySimbolos)-1);
            $stringVolcado .= $arraySimbolos[$auxPosSimbolos];
        }
    }

    $stringVolcado = htmlspecialchars($stringVolcado);
    echo "<br>";
    print($stringVolcado);
