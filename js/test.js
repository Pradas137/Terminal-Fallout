window.addEventListener("load", function () {
    var wordsLen = document.getElementsByClassName('word').length;
    var symbolsLen = document.getElementsByClassName('symbol').length;

    if (wordsLen === 6 && symbolsLen === 3) {
        location.reload();
    } else {
        console.log("Palabras: " + wordsLen);
        console.log("Simbolos: " + symbolsLen);
        console.log("Error");
    }
});