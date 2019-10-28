window.addEventListener("load", function () {
    document.getElementById("play").addEventListener("click", function () {
        document.getElementById("menu").classList.add("hide");
        document.getElementById("mode").classList.remove("hide");
    });
})