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
            <input type="text" onclick="end()" hidden>
              <h3><< == Terminal Unblocked == >></h3>
              <h5>Insert your name for add your points to ranking:</h5>
              <form action="../index.php" method="post">
                <input type="text" name="name" required autofocus>
                <input type="hidden"  name="failedAttempts" id="failedAttempts">
                <input type="hidden" name="gameTime" id="gameTime">
                <input type="image" src="../resources/button.png" alt="submit" width="30%">
              </form>
            </div>
      </div>
      <div id="losePanel" class="terminal hide">
        lose
      </div>
    </div>
    <!-- only for test purposes -->
    <footer>
      <h3>Tests:</h3>
      <button id='testwin'>win</button><button id="testlose">lose</button>
    </footer>
  </body>
</html>
