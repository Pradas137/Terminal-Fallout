<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/ranking.css">
    <title>Ranking</title>
</head>

<body>
    <h1>Ranking</h1>
    <?php
    //Import all the records from the file and append them to an array
    $records = explode("\n", trim(file_get_contents('../resources/rankingDataMock.txt'))); //todo change file

    //Separate the records by failed attempts and add them to an array of arrays,
    //where the index indicates how many attempts are failed
    $rankingByAttempts = [[], [], [], [], [], []];
    foreach ($records as $record) {
        $splitedRecord = explode(';', $record);
        $attempts = $splitedRecord[1];
        $rankingByAttempts[$attempts][count($rankingByAttempts[$attempts])] = $splitedRecord;
    }

    foreach ($rankingByAttempts as $subArray) {
        usort($subArray, function ($a, $b) {
            return $a[2] <=> $b[2];
        });
    }


    //prints $rankingByAttempts like a table
    echo "<table>";
    echo "<tr><th>RANK</th><th>NAME</th><th>ATTEMPTS</th><th>TIME</th></tr>";
    $index = 1;
    foreach ($rankingByAttempts as $array) {
        foreach ($array as  $att) {
            echo "<tr><td>".$index."</td><td>".$att[0]."</td><td>".$att[1]."</td><td>".$att[2]."</tr>";
            $index++;
        }
    }
    echo "</table>";
    ?>
    
</body>

</html>