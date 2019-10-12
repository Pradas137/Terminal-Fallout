<?php
    // 12 caracteres por fila 
    // 17 filas por columna 
    // 2 columnas
    // 6 palabras 5 caracteres
    // 408 caracteres (378 Simbolos 30 caracteres de string)

    define("CHAR_TOTAL",408);
    $arrayPalabras=["PALAA","PALAS","PALAD","PALAF","PALAG","PALAH"];
    // $arrayPalabras= require('php/archivo.php')
    $lengthPalabra = strlen($arrayPalabras[0]);
    // $arrayPalabras = require 'diccionarioFallout.php';
    // foreach ($arrayPalabras as $key) {
    //     $a = strlen($key);
    //     echo "$key, len:$a <br><br> ";
    // }
    $arraySimbolos=["<",">",",","`","!","@","#","$","%","^","&","*","(",")","?","\\","|","/",":",";","+","[","]", "=", "{", "}"];
    $copyArrayPalabras = $arrayPalabras;
    $arrayPosicionesPalabras=[];

    //Get 6 random positions to put our random words without overlapping
    while (count($arrayPosicionesPalabras) < 6) {
        $randomNum = rand(0,(CHAR_TOTAL-$lengthPalabra));
        $aux = 0;
        if($randomNum < (CHAR_TOTAL/2)-$lengthPalabra-1 or $randomNum>(CHAR_TOTAL/2)){
            foreach($arrayPosicionesPalabras as $posicionRandom){
                if($randomNum <  ($posicionRandom + $lengthPalabra+2) and $randomNum > ($posicionRandom - $lengthPalabra-2)) {
                    $aux++;
                }
            }
            if ($aux == 0) {
                array_push($arrayPosicionesPalabras,$randomNum);
            }
        }
    }

    //Create one string with symbols and our words placed in the space that we created before
    $stringVolcado="";
    while (strlen($stringVolcado) < CHAR_TOTAL) {
        $posAux = strlen($stringVolcado);
        if (in_array($posAux,$arrayPosicionesPalabras)){
            $aux = array_shift($copyArrayPalabras);
            $stringVolcado .= $aux;
        }else{
            $auxPosSimbolos = rand(0,count($arraySimbolos)-1);
            $stringVolcado .= $arraySimbolos[$auxPosSimbolos];
        }
    }

    $arrayLetters = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
    
    $countChar=0;
    $filas =0;

    //Breack up the line every 12 chars, also divide equally the long string in 2 divs (this 2 divs are not opened and closed properly yet)
    for ($pos=0; $pos <strlen($stringVolcado); $pos++){
        if($countChar == 12){
            if($filas == 16){
                $countChar = 0;
                $subString = "</div><div class ='col4'>"; 

                $firstPartVolcado = substr($stringVolcado, 0, $pos);
                $lastPartVolcado = substr($stringVolcado, $pos);

                $stringVolcado = $firstPartVolcado.$subString.$lastPartVolcado;
                $pos += strlen($subString)-1;
                $filas++;
            }else{
                $countChar = 0;
                $filas++;
                $subString = "<br>"; 

                $firstPartVolcado = substr($stringVolcado, 0, $pos);
                $lastPartVolcado = substr($stringVolcado, $pos);

                $stringVolcado = $firstPartVolcado.$subString.$lastPartVolcado;
                $pos += strlen($subString)-1;
            }
        }else{
            $countChar++;
        }
    }

    //Escape the string to avoid errors when we visualize it in HTML
    $stringVolcado=htmlspecialchars($stringVolcado);
    //Unescape the entities that we need like the divs and the BR
    $stringVolcado=str_replace("&lt;br&gt;","<br>",$stringVolcado);
    $stringVolcado=str_replace("&lt;/div&gt;&lt;div class ='col4'&gt;","</div><div class ='col4'>",$stringVolcado);

    //Detect the words that are divided into differents rows
    $arrayCuttedWords=[];
    foreach($arrayPalabras as $key=>$word){
        if(!strpos($stringVolcado,$word)){
            array_push($arrayCuttedWords,$word);
        }
    }
    $copyArrayPalabras = array_diff($arrayPalabras,$arrayCuttedWords);

    // echo "-----------------<br>Palabras";
    // print_r($arrayPalabras);
    // echo"<br>PalabrasCortadas";
    // print_r($arrayCuttedWords);
    // echo"<br>Palabras sin cortar";
    // print_r($copyArrayPalabras);
    // echo "<br>-----------------";

    //Add <span> to words that are in a single line
    foreach($copyArrayPalabras as $palabra){
        $repString = "<span id='$palabra' class='word'>$palabra</span>";
        $stringVolcado = str_replace($palabra, $repString, $stringVolcado);
    }

    //Add <span> to words that are on differents lines
    foreach($arrayCuttedWords as $palabra){
        $repString = "<span id='$palabra' class='word'>$palabra</span>";
        for ($i = 1; $i < strlen($palabra); $i++){
            $subString = substr($palabra,0,$i)."<br>".substr($palabra,$i);
            $repString = "<span id='$palabra' class='word'>$subString</span>";
            $stringVolcado = str_replace($subString, $repString, $stringVolcado);
        }
    }

    //Open and close the previous <div>
    $stringVolcado = "<div class ='col2'>".$stringVolcado;
    $stringVolcado .= "</div>";

    //Create the string that simulates a memory access, in hex
    $accesNum = rand(11,60)*1000;
    $rows=1;
    $firstCol ="<div class ='col1'>";
    $thirdCol ="<div class ='col3'>";
    while($rows<17){
        $firstCol .= strtoupper("0x".dechex($accesNum)."<br>");
        $accesNum+=12;
        $rows++;
    }
    $firstCol .= "</div>";
    while($rows<34){
        $thirdCol .= strtoupper("0x".dechex($accesNum)."<br>");
        $accesNum+=12;
        $rows++;
    }
    $thirdCol .= "</div>";

    
    echo "<div id='root'>";
    print($stringVolcado);
    echo "</div><br>";
    print($firstCol);
    echo"<br>";
    print($thirdCol);

