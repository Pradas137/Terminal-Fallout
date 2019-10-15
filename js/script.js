window.addEventListener("load", function () {
    var words = document.getElementsByClassName('word');
    const password = 'PALAD';   // const password = this.document.getElementById('password').value;
    var tries = 4;
    var gameRun = true;

    //Show initial attempts
    renewAttempts();

    //Add event listener to all the words
    for (let index = 0; index < words.length; index++) {
        words[index].addEventListener("click", checkPassword);
    };

    function checkPassword(event) {
        if (gameRun) {
            if (event.target.id === password) {
                win();
            } else {
                checkCoincidentChar(event.target.id);
            }
        }
    }

    function checkCoincidentChar(word) {
        var coincidentChar = 0;
        for (let i = 0; i < word.length; i++) {
            if (word[i] === password[i]) {
                coincidentChar++;
            }
        }
        //Change the letters for dots
        var wordSpan = document.getElementById(word);
        var stringDots = "";
        spanValue = wordSpan.innerHTML;
        for (let index = 0; index < spanValue.length; index++) {
            if (spanValue[index] === "<") {
                stringDots += "<br>";
                index += 3;
            } else {
                stringDots += ".";
            }
        }
        wordSpan.innerHTML = stringDots;

        //Remove the class and the eventlistener
        wordSpan.classList.remove('word');
        wordSpan.removeEventListener("click", checkPassword);

        //show how many letters match
        console.log(word);
        console.log("Coinciden " + coincidentChar + " letras");

        //Subtract one attempt, redraw the attempts marker and checks if you have more attempts
        tries--;
        renewAttempts();
        if (tries == 0) {
            lose();
        }

    }

    function renewAttempts() {
        triesElement = document.getElementById('tries');
        charTrie = "█ ";    //This char represents an attempt
        attemptMarker = "";
        for (let index = 0; index < tries; index++) {
            attemptMarker += charTrie;
        }
        triesElement.innerHTML = attemptMarker;

    }

    function win() {
        gameRun = false;
        console.log("has ganado");
    }

    function lose() {
        gameRun = false;
        console.log("juego acabado");
    }

});
