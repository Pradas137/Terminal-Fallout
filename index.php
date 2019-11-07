<?php
//If a session game exists, it is deleted
session_start();
if (isset($_SESSION["game"])) {
  unset($_SESSION["game"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./css/mainMenu.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="./js/menu.js"></script>
  <title>Game Menu</title>
</head>

<body>
  <div id="container">
    <h1>Terminal Fallout</h1>
    <div id="menu">
      <div class="buttons">
        <button class="button" id="play" accesskey="p">Play</button>
        <button class="button" onclick="window.location.href='php/ranking.php'" accesskey="r">Ranking</button>
      </div>
    </div>
    <div id="mode" class="hide">
      <form action="./php/game.php">
        <div class="buttons">
          <input type="submit" value="easy" class="playButton" accesskey="y">
          <input type="submit" name="difficulty" value="normal" class="playButton" accesskey="n">
          <input type="submit" name="difficulty" value="hard" class="playButton" accesskey="h"><br>
          <div class="hardcore">
            <p>Hardcore</p>
            <div class="slide">
              <input name="hardcore" type="checkbox" id="slide" />
              <label for="slide"></label>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div id="options">
    <i id="volume" class="material-icons" accesskey="u"> volume_up </i>
    <i id="colorBlindness" class="material-icons off" accesskey="d"> visibility_off </i>
  </div>
  <div id="audioLibrary">
    <audio id="poweron" class="sound" src="./resources/sounds/poweron.ogg"></audio>
  </div>
</body>

</html>