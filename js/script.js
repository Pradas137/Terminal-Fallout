window.addEventListener("load", function () {
    var words = document.getElementsByClassName('word');
    var prompt = document.getElementById('prompt');
    const passwordValue = document.getElementById('password').value;
    var arrayPrompt = Array(17).fill("<br>");
    var tries = 4;
    var gameRun = true;
    var points;

    //Show initial attempts
    renewAttempts();

    //Add event listener to all the words
    for (let index = 0; index < words.length; index++) {
        words[index].addEventListener("click", checkPassword);
    };

    function checkPassword(event) {
        if (gameRun) {
            if (event.target.id === passwordValue) {
                win();
            } else {
                checkCoincidentChar(event.target.id);
            }
        }
    }

    function checkCoincidentChar(word) {
        var coincidentChar = 0;
        for (let i = 0; i < word.length; i++) {
            if (word[i] === passwordValue[i]) {
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

        //Subtract one attempt, redraw the attempts marker, renews the prompt and checks if you have more attempts
        tries--;
        renewAttempts();
        if (tries == 0) {
            lose();
        } else {
            renewPrompt(word, coincidentChar);
        }

    }

    //Draw the charTrie as many times as attempts remain
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
        points = 100;
        gameRun = false;
        endPanel(points, true)
    }

    function lose() {
        points = 0;
        gameRun = false;
        endPanel(points, false);
    }

    function endPanel(points, win) {
        if (win) {
            var msg = "has ganado";
        } else {
            var msg = "has perdido";
        }
        msg += "<br>Tienes " + points + " puntos";

        //Hide the gamePanel and show the endPanel
        var gamePanel = document.getElementById('gamePanel');
        var endPanel = document.getElementById('endPanel');
        var msgEnd = document.getElementById('msgEnd');
        gamePanel.classList += " hide";
        endPanel.classList = "terminal";
        msgEnd.innerHTML = msg;
    }

    //Get the word and how many chars are coincident and print this information in the prompt,
    //this prompt is an array with 17 holes (one for each row) and works like a queue
    function renewPrompt(word, coincidentChar) {
        promptQueue(word);
        promptQueue("Entry Denied");
        promptQueue("Likeness=" + coincidentChar);
        prompt.innerHTML = arrayPrompt.join("");
    }

    //Removes the frist element from the array and one in the queue
    function promptQueue(value) {
        arrayPrompt.shift();
        arrayPrompt.push(">" + value + "<br>");
    }
});
