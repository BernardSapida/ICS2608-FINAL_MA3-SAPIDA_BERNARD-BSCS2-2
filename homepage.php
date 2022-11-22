<?php
    session_start();

    // Uncomment this if youn want to reset attempts to 3
    // $_SESSION["attempts"] = 3;

    if(!isset($_SESSION["attempts"])) $_SESSION["attempts"] = 3;
    if(!empty($_SESSION["IS_LOGGED_IN"]) && $_SESSION["IS_LOGGED_IN"] == 1) header("Location: quiz.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="./public/css/design.css">
        <title>HQuiz</title>
    </head>
    <body>
        <?php include_once "header.php" ?>

        <script src="./public/js/homepage.js"></script>
    </body>
</html>