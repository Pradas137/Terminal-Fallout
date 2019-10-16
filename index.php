<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link href="https://fonts.googleapis.com/css?family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/terminal.css">
    <script src="js/script.js"></script>
    <title>Fallout Hack Terminal</title>
  </head>
  <body class="background">
    <div id="container" class="terminal">
      <div id="gamePanel">
        <p id="title">ROBCO INDUSTRIES (TM) TERMINAL PROTOCOL</p>
        <span>ENTER PASSWORD NOW</span>
        <div id="attempts">
          <span>ATTEMPT(S) LEFT: </span><span id="tries"></span>
        </div>
        <div id="terminal">
            <?php require 'php/stringVolcado.php';?>
              <div class="input">
                <div id="prompt"></div>
              </div>
            </div>
        </div>
      </div>
      <div id="endPanel" class="terminal  hide"><p id="msgEnd"></p></div>
    </div>
  </body>
</html>
