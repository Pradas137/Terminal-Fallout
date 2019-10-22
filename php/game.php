<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="https://fonts.googleapis.com/css?family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/terminal.css">
    <script src="../js/script.js"></script>
    <title>Fallout Hack Terminal</title>
  </head>
  <body class="background">
    <!-- only for test purposes -->
    <!-- <script src="../js/test.js"></script> -->
    <header>
      <h3>Tests:</h3>
      <button id='testwin'>win</button><button id="testlose">lose</button><br>
      <span id="passtest"></span>
    </header>
    <!--  -->
    <div id="container" class="terminal">
      <div id="gamePanel">
        <div id="header-container">
          <p id="title">ROBCO INDUSTRIES (TM) TERMINAL PROTOCOL</p>
          <p id="timer"> <output id="display-area">00:00.000</output></p>
        </div>
        <span>ENTER PASSWORD NOW</span>
        <div id="attempts">
          <span>ATTEMPT(S) LEFT: </span><span id="tries"></span>
        </div>
        <div id="terminal">
            <?php require './stringDump.php';?>
              <div class="input" id="prompt-position">
                <div id="prompt"></div>
                <div id="cursor">
                  <p>></p><p class="blink">█</p>
                </div>
              </div>
            </div>
        </div>
      </div>
      <div id="winPanel" class="terminal hide">
          <div id="rankigForm" class="hide">
              <h3><input type="image" src="../resources/boy.jpg" alt="submit" width="50%"></h3>
              <h5>Enter your name to appear in the ranking</h5>
              <form action="../index.php" method="post">
                <input type="text" name="name" required autofocus>
                <input type="hidden"  name="failedAttempts" id="failedAttempts">
                <input type="hidden" name="gameTime" id="gameTime">
                <input type="image" src="../resources/button.jpg" alt="submit" width="30%">
              </form>
            </div>
      </div>
      <div id="losePanel" class="terminal hide">
        <h5>Terminal Failed:</h5>
        <h3><input type="image" src="../resources/hongo-atómico-nuclear.jpg" alt="submit" width="50%"></h3>
        <h5>You have failed</h5>
        <button onclick="window.location.href='../index.php'" class="button">Menu</button>
        <button onclick="window.location.href='./ranking.php'" class="button">Ranking</button>
      </div>
    </div>
    <div id="rotate">Turn your device or resize your browser</div>
    <!-- only for test purposes -->
    <footer>
      <h3>Tests:</h3>
      <button id='testwin'>win</button><button id="testlose">lose</button>
    </footer>
  </body>
</html>
