window.addEventListener("load", function () {
    var muted = false;
    var volume = document.getElementById("volume");
    var colorBlindnessActivated = false;
    var colorBlindness = document.getElementById("colorBlindness");
    var gamePanel = document.getElementById('gamePanel');

    //Volume control
    volume.addEventListener("click", function () {
        if (muted) {
            muted = false;
            volume.innerHTML = "volume_up";
        } else {
            muted = true;
            volume.innerHTML = "volume_off";
        }
        document.muted = muted; //TODO
    });

    //Color mode control
    colorBlindness.addEventListener("click", function () {
        if (colorBlindnessActivated) {
            colorBlindnessActivated = false;
            //Change the menu icon
            colorBlindness.innerHTML = "visibility_off";

            //Remove the class from the HTML entites
            gamePanel.classList.add("screenEffect");
            document.body.classList.remove("colorBlindness");
            removeClass(document.getElementsByClassName("word"), "hoverColorBlindness");
            removeClass(document.getElementsByClassName("symbol"), "hoverColorBlindness");
            document.getElementById("rankigForm").classList.remove("cBlindness")
            document.getElementById("losePanel").classList.remove("cBlindness")
            document.getElementById("options").classList.remove("bordercolorBlindness")
        } else {
            colorBlindnessActivated = true;
            //Change the menu icon
            colorBlindness.innerHTML = "visibility";

            //Add the class to HTML entites that apply a special style
            gamePanel.classList.remove("screenEffect");
            document.body.classList.add("colorBlindness");
            addClass(document.getElementsByClassName("word"), "hoverColorBlindness");
            addClass(document.getElementsByClassName("symbol"), "hoverColorBlindness");
            document.getElementById("rankigForm").classList.add("cBlindness")
            document.getElementById("losePanel").classList.add("cBlindness")
            document.getElementById("options").classList.add("bordercolorBlindness")
        }
    });

    function addClass(elements, classN) {
        for (let index = 0; index < elements.length; index++) {
            elements[index].classList.add(classN);
        }
    }

    function removeClass(elements, classN) {
        for (let index = 0; index < elements.length; index++) {
            elements[index].classList.remove(classN);
        }
    }
})