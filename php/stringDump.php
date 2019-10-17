<?php
define("CHAR_TOTAL", 408);
$arrayWords = require('php/loadDictionary.php');
$copyArrayWords = $arrayWords;
$lengthWord = strlen($arrayWords[0]);
$arraySimbolos = ["<", ">", ",", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "?", "\\", "|", "/", ":", ";", "+", "[", "]", "=", "{", "}"];
$arrayLetters = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];

//Get 6 random positions to put our random words without overlapping
$arrayWordsPosition = [];
while (count($arrayWordsPosition) < 6) {
    $randomNum = rand(0, (CHAR_TOTAL - $lengthWord));
    $engaged = false;
    if ($randomNum < (CHAR_TOTAL / 2) - $lengthWord or $randomNum > (CHAR_TOTAL / 2)) {
        foreach ($arrayWordsPosition as $position) {
            if ($randomNum < ($position + $lengthWord + 2) and $randomNum > ($position - $lengthWord - 2)) {
                $engaged = true;
            }
        }
        if (!$engaged) {
            array_push($arrayWordsPosition, $randomNum);
        }
    }
}

//Create one string with symbols and our words placed in the space that we created before
$stringDump = "";
while (strlen($stringDump) < CHAR_TOTAL) {
    $currentPos = strlen($stringDump);
    if (in_array($currentPos, $arrayWordsPosition)) {
        $stringDump .= array_shift($copyArrayWords);
    } else {
        $stringDump .= $arraySimbolos[rand(0, count($arraySimbolos) - 1)];
    }
}

//Breack up the line every 12 chars, also divide equally the stringDump in 2 divs (this 2 divs are not opened and closed properly yet)
$countChar = 0;
$row = 0;
for ($pos = 0; $pos < strlen($stringDump); $pos++) {
    if ($countChar == 12) {
        if ($row == 16) {
            $countChar = 0;
            $subString = "</div><div class ='col4'>";

            $firstPartDump = substr($stringDump, 0, $pos);
            $lastPartDump = substr($stringDump, $pos);

            $stringDump = $firstPartDump . $subString . $lastPartDump;
            $pos += strlen($subString) - 1;
        } else {
            $countChar = 0;
            $subString = "<br>";

            $firstPartDump = substr($stringDump, 0, $pos);
            $lastPartDump = substr($stringDump, $pos);

            $stringDump = $firstPartDump . $subString . $lastPartDump;
            $pos += strlen($subString) - 1;
        }
        $row++;
    } else {
        $countChar++;
    }
}

//Escape the string to avoid errors when we visualize it in HTML
$stringDump = htmlspecialchars($stringDump);
//Unescape the entities that we need like the divs and the BR
$stringDump = str_replace("&lt;br&gt;", "<br>", $stringDump);
$stringDump = str_replace("&lt;/div&gt;&lt;div class ='col4'&gt;", "</div><div class ='col4'>", $stringDump);

//Add <span> to words
foreach ($arrayWords as $word) {
    for ($i = 0; $i < strlen($word); $i++) {
        if ($i == 0) {  //Only for words that are in the same line
            $repString = "<span id='$word' class='word'>$word</span>";
            $stringDump = str_replace($word, $repString, $stringDump);
        } else {        //For words that are divided in differents lines
            $subString = substr($word, 0, $i) . "<br>" . substr($word, $i);
            $repString = "<span id='$word' class='word'>$subString</span>";
            $stringDump = str_replace($subString, $repString, $stringDump);
        }
    }
}

//Open and close the previous <div>
$stringDump = "<div class ='col2'>" . $stringDump;
$stringDump .= "</div>";

//Create the string that simulates a memory access, in hex
$accesNum = rand(11, 60) * 1000;
$rows = 0;
$firstCol = "<div class ='col1'>";
$thirdCol = "<div class ='col3'>";
while ($rows < 17) {
    $firstCol .= strtoupper("0x" . dechex($accesNum) . "<br>");
    $accesNum += 12;
    $rows++;
}
$firstCol .= "</div>";
while ($rows < 34) {
    $thirdCol .= strtoupper("0x" . dechex($accesNum) . "<br>");
    $accesNum += 12;
    $rows++;
}
$thirdCol .= "</div>";

//Insert intro HTML, the div with id 'root' will be closed html
echo "<div id='root'>$firstCol$stringDump$thirdCol";
