<?php
    $score = 50;
    // using if statement 
    // if($score >40){
    //     echo 'high score';
    // }else {
    //     echo 'low score';
    // }

    // using tenary operator 
    // $val = $score > 40 ? 'high score' : 'low score';
    // echo $val

    echo $_SERVER['SERVER_NAME'] .'<br/>';
    echo $_SERVER['REQUEST_METHOD'] .'<br/>';
    echo $_SERVER['SCRIPT_FILENAME'] .'<br/>';
    echo $_SERVER['PHP_SELF'] .'<br/>';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        p{
            color:red;
        }
    </style>
</head>
<body>
    <p > <?php echo  $score > 40 ? 'high score' : 'low score'; ?> </p>
</body>
</html>