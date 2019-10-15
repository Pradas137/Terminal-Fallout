<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/terminal.css">
    <script src="js/script.js"></script>
    <title>Fallout Hack Terminal</title>
  </head>
  <body class="background">
    <div id="container" class="terminal content">
      <div id="gamePanel">
        <p id="title">ROBCO INDUSTRIES (TM) TERMINAL PROTOCOL</p>
        <span>ENTER PASSWORD NOW</span>
        <div id="attempts">
          <span>ATTEMPT(S) LEFT: </span><span id="tries"></span>
        </div>
        <div id="terminal">
            <?php require 'php/stringVolcado.php';?>
              <div id="input">
                Sección en la que el usuario añadirá datos
              </div>
            </div>
        </div>
      </div>
      <div id="endPanel" class="hide"><p id="msgEnd"></p></div>
    </div>
  </body>
</html>
