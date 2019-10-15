window.addEventListener("load", function () {
    var words = document.getElementsByClassName('word');
    const password = this.document.getElementById('password').value;
    var tries = 4;

    for (let index = 0; index < words.length; index++) {
        words[index].addEventListener("click", checkPassword);
    };

    function checkPassword(event) {
        if (event.target.id === password) {
            win();
        } else {
            checkCoincidentChar(event.target.id);
        }
    }

    function checkCoincidentChar(word) {
        console.log("comprobando coincidencias");
        var coincident = 0;
        for (let i = 0; i <word.length; i++) {
            if(word[i]===password[i]){
                coincident++;
            }
        }
        //Ponemos puntitos en la string
        var wordSpan = document.getElementById(word);
        var stringPoints = "";
        spanValue=wordSpan.innerHTML;
        for (let index = 0; index < spanValue.length; index++) {
            if(spanValue[index] === "<"){
                stringPoints += "<br>"
                index +=3;
            }else{
                stringPoints +="."
            }
        }
        wordSpan.innerHTML = stringPoints;

        //eliminamos la clase y el evento
        wordSpan.classList.remove('word');
        wordSpan.removeEventListener("click", checkPassword);

        //decimos cuantas letras coinciden
        console.log("Coinciden "+coincident+" letras");

        //si no quedan vidas temina el juego
        tries--;
        if(tries == 0){
            endgame();
        }else{
            renewTries();
        }
        
    }

    function renewTries() {
        trieselement = document.getElementById('tries');
        charTrie = "█ ";    //String que representa una vida
        stringTrie = "";
        for (let index = 0; index < tries; index++) {
            stringTrie += charTrie;
        }
        trieselement.innerHTML = stringTrie;
        
    }
    function win() {
        console.log("has ganado");
    }




});
