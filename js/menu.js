window.addEventListener("load", function () {
    var muted = false;
    var volume = document.getElementById("volume");
    var colorBlindnessActivated = false;
    var colorBlindness = document.getElementById("colorBlindness");

    document.getElementById("play").addEventListener("click", function () {
        document.getElementById("menu").classList.add("hide");
        document.getElementById("mode").classList.remove("hide");
    });

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
            document.body.classList.remove("colorBlindness");
            document.getElementById("menu").classList.remove("cBlindness");
            document.getElementById("mode").classList.remove("cBlindness");
            document.getElementById("options").classList.remove("bordercolorBlindness")
        } else {
            colorBlindnessActivated = true;
            //Change the menu icon
            colorBlindness.innerHTML = "visibility";

            //Add the class to HTML entites that apply a special style
            document.body.classList.add("colorBlindness");
            document.getElementById("menu").classList.add("cBlindness");
            document.getElementById("mode").classList.add("cBlindness");
            document.getElementById("options").classList.add("bordercolorBlindness")
        }
    });
})