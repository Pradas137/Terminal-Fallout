<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Game Menu</title>
</head>

<body>
  <h1>Menu</h1>
  <button onclick="window.location.href='php/game.php'">Game</button><br>
  <button onclick="window.location.href='php/ranking.php'">Ranking</button>
  <?php
  if (!empty($_POST["name"]) || !empty($_POST["failedAttempts"]) || !empty($_POST["gameTime"])) {
    $record = htmlspecialchars($_POST["name"]) . ";" . $_POST["failedAttempts"] . ";" . $_POST["gameTime"] . "\n";
    $fileRankingData = './resources/rankingData.txt';
    if (file_exists($fileRankingData)) {
      $previousData = file_get_contents($fileRankingData);
    } else {
      $previousData = '';
    }
    file_put_contents($fileRankingData, "$previousData$record");

    //Prevent multiple entry of the same data if the user reload the page
    header('Location: ./index.php');
  }
  ?>
</body>

</html>