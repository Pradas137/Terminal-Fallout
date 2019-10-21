<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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


    //prints $rankingByAttempts
    foreach ($rankingByAttempts as $key => $array) {
        echo "===intetnos: $key===<br>";
        foreach ($array as $att) {
            echo "-----elemento---- <br>";
            print_r($att);
            echo "<br>";
        }
        echo '<br>';
    }
    ?>
</body>

</html>