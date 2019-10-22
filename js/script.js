window.addEventListener("load", function () {
    var words = document.getElementsByClassName('word');
    var prompt = document.getElementById('prompt');
    const passwordValue = document.getElementById('password').value;
    var arrayPrompt = Array(16).fill("<br>");
    var tries = 4;
    var gameRun = true;
    var failedAttempts = 0;
    var gameTime = "";
    var startTime = Date.now();
    var timeBegan = null, timeStopped = null, stoppedDuration = 0, started = null;

    if (timeBegan === null) {
        timeBegan = new Date();
    }

    if (timeStopped !== null) {
        stoppedDuration += (new Date() - timeStopped);
    }
    console.log(stoppedDuration);

    started = setInterval(clockRunning, 10);
    function clockRunning(){
        var currentTime = new Date()
            , timeElapsed = new Date(currentTime - timeBegan - stoppedDuration)
            , hour = timeElapsed.getUTCHours()
            , min = timeElapsed.getUTCMinutes()
            , sec = timeElapsed.getUTCSeconds()
            , ms = timeElapsed.getUTCMilliseconds();

        document.getElementById("display-area").innerHTML =
            (hour > 9 ? hour : "0" + hour) + ":" +
            (min > 9 ? min : "0" + min) + ":" +
            (sec > 9 ? sec : "0" + sec) + "." +
            (ms > 99 ? ms : ms > 9 ? "0" + ms : "00" + ms);
    };

    var currentTime = new Date()
            , timeElapsed = new Date(currentTime - timeBegan - stoppedDuration)
            , hour = timeElapsed.getUTCHours()
            , min = timeElapsed.getUTCMinutes()
            , sec = timeElapsed.getUTCSeconds()
            , ms = timeElapsed.getUTCMilliseconds();

        document.getElementById("display-area").innerHTML =
            (hour > 9 ? hour : "0" + hour) + ":" +
            (min > 9 ? min : "0" + min) + ":" +
            (sec > 9 ? sec : "0" + sec) + "." +
            (ms > 99 ? ms : ms > 9 ? "0" + ms : "00" + ms)

    //Show initial attempts
    renewAttempts();
    test();

    //Add event listener to all the words
    for (let index = 0; index < words.length; index++) {
        words[index].addEventListener("click", checkPassword);
    };

    function checkPassword(event) {
        if (gameRun) {
            if (event.target.id === passwordValue) {
                var endTime = new Date();
                var timeDiff = endTime - startTime; //in ms
                // strip the ms
                timeDiff /= 1000;

                // get seconds
                var finalTime = Math.round(timeDiff);
                console.log(finalTime + " seconds");
                win(finalTime);
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

        //Subtract one attempt,add a failed attempt, redraw the attempts marker, renews the prompt and checks if you have more attempts
        tries--;
        failedAttempts++;
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

    //put the failed attempts and the game time in the HTML form to send all the data for ranking
    function win(finalTime) {
        document.getElementById("failedAttempts").value = failedAttempts;
        document.getElementById("gameTime").value = finalTime;
        endGame(true)
    }

    function lose() {
        endGame(false);
    }

    function endGame(win) {
        gameRun = false;
        //Hide the gamePanel and show the win or lose panel
        var gamePanel = document.getElementById('gamePanel');
        gamePanel.classList += " hide";

        if (win) {
            var winPanel = document.getElementById('winPanel');
            winPanel.classList = "terminal";
            setTimeout(function () {
                document.getElementById("rankigForm").classList = "";
            }, 400); //todo change value
        } else {
            var losePanel = document.getElementById('losePanel');
            losePanel.classList = "terminal";
        }
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

    //only for test purposes
    function test() {
        document.getElementById('testwin').addEventListener("click", function () {
            failedAttempts = 2;
            gameTime = "0:45"
            win();
        });
        document.getElementById('testlose').addEventListener("click", lose);
    }
});
