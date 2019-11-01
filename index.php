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
        <button class="button" id="play">Play</button>
        <button class="button" onclick="window.location.href='php/ranking.php'">Ranking</button>
      </div>
    </div>
    <div id="mode" class="hide">
      <form action="./php/game.php">
        <div class="buttons">
          <input type="submit" value="easy" class="playButton">
          <input type="submit" name="difficulty" value="normal" class="playButton">
          <input type="submit" name="difficulty" value="hard" class="playButton"><br>
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
    <i id="volume" class="material-icons"> volume_up </i>
    <i id="colorBlindness" class="material-icons off"> visibility_off </i>
  </div>
</body>

</html>