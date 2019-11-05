<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Share+Tech+Mono&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../css/ranking.css">
  <script src="../js/ranking.js"></script>
  <title>Ranking</title>
</head>

<body>
  <div class="buttons">
    <form method="post" id="rank-form">
      <label class="adjust-left" for="level-select">Select level:</label>
      <select class="button-rank" name="level-select" onchange='this.form.submit();'>
        <?php
        if (isset($_POST['level-select']) and $_POST['level-select'] == "normal") {
          echo "<option value='easy'>Easy</option>";
          echo "<option value='normal' selected>Normal</option>";
          echo "<option value='hard'>Hard</option>";
        } else if (isset($_POST['level-select']) and $_POST['level-select'] == "hard") {
          echo "<option value='easy'>Easy</option>";
          echo "<option value='normal'>Medium</option>";
          echo "<option value='hard' selected>Hard</option>";
        } else {
          echo "<option value='easy' selected>Easy</option>";
          echo "<option value='normal'>Medium</option>";
          echo "<option value='hard'>Hard</option>";
        } ?>
      </select>
    </form>
  </div>
  <table>
    <tr>
      <th>RANK</th>
      <th>NAME</th>
      <th>FAILED<br>ATTEMPTS</th>
      <th>TIME (s)</th>
    </tr>
    <?php

    if (empty($_POST["level-select"])) {
      $_POST["level-select"] = "easy";
    }
    //Import all the records from the file and append them to an array
    $records = explode("\n", trim(file_get_contents('../resources/rankingData.txt')));

    //Separate the records by failed attempts and add them to an array of arrays,
    //where the index indicates how many attempts are failed
    $rankingByAttempts = [[], [], [], [], [], []];
    foreach ($records as $record) {
      $splitedRecord = explode(';', $record);
      $attempts = $splitedRecord[1];
      $rankingByAttempts[$attempts][count($rankingByAttempts[$attempts])] = $splitedRecord;
    }

    $rankingByTime = [[], [], [], [], [], []];
    foreach ($rankingByAttempts as $i => $subArray) {
      uasort($subArray, function ($a, $b) {
        return intval($a[2]) - intval($b[2]);
      });
      $rankingByTime[$i] = $subArray;
    }
    //Check if have all the needed paramethers in the post
    $requiredPost = ['name', 'failedAttempts', 'gameTime'];

    $missing = false;
    foreach ($requiredPost as $key) {
      if (!isset($_POST[$key])) {
        $missing = true;
      }
    }

    //prints $rankingByAttempts like a table
    $easyCount = 0;
    $normalCount = 0;
    $hardCount = 0;
    foreach ($rankingByTime as $array) {
      foreach ($array as  $att) {
        $time = intval($att[2]) / 1000;
        if ($att[3] == $_POST["level-select"]) {
          $easyCount++;
          if (!$missing and $_POST["name"] == $att[0] and ($_POST["failedAttempts"] == $att[1]) and ($_POST["gameTime"] == $att[2])) {
            echo "<tr id=highlight><td>" . $easyCount . "</td><td>" . $att[0] . "</td><td>" . $att[1] . "</td><td>" . $time . "</tr>";
          } else {
            echo "<tr><td>" . $easyCount . "</td><td>" . $att[0] . "</td><td>" . $att[1] . "</td><td>" . $time . "</tr>";
          }
        } elseif ($att[3] == $_POST["level-select"]) {
          $normalCount++;
          if (!$missing and $_POST["name"] == $att[0] and ($_POST["failedAttempts"] == $att[1]) and ($_POST["gameTime"] == $att[2])) {
            echo "<tr id=highlight><td>" . $normalCount . "</td><td>" . $att[0] . "</td><td>" . $att[1] . "</td><td>" . $time . "</tr>";
          } else {
            echo "<tr><td>" . $normalCount . "</td><td>" . $att[0] . "</td><td>" . $att[1] . "</td><td>" . $time . "</tr>";
          }
        } elseif ($att[3] == $_POST["level-select"]) {
          $hardCount++;
          if (!$missing and $_POST["name"] == $att[0] and ($_POST["failedAttempts"] == $att[1]) and ($_POST["gameTime"] == $att[2])) {
            echo "<tr id=highlight><td>" . $hardCount . "</td><td>" . $att[0] . "</td><td>" . $att[1] . "</td><td>" . $time . "</tr>";
          } else {
            echo "<tr><td>" . $hardCount . "</td><td>" . $att[0] . "</td><td>" . $att[1] . "</td><td>" . $time . "</tr>";
          }
        }
      }
    }
    ?>
  </table>
  <div class="buttons">
    <button onclick="window.location.href='../index.php'" class="button">Menu</button>
  </div>
  <div id="options">
    <i id="colorBlindness" class="material-icons off"> visibility_off </i>
  </div>

</body>

</html>