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

        <main>
            <section>
                <img src="./public/images/homepage.jpg" alt="Homepage Background" width="50">
                <div class="my-5 mx-auto text-center">
                    <h1><strong>About the Quiz</strong></h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium ea dolores excepturi molestias voluptatibus quam eum nemo animi delectus! Ipsam at sapiente magnam provident nostrum ullam nam voluptatem culpa ipsum!</p>
                    <button class="py-2 px-3 rounded btn-start text-light mx-auto" id="btn-start">Login to Start</button>
                </div>
            </section>
        </main>

        <footer class="p-3 bg-dark w-100">
            <p class="m-0 text-center text-light">All rights reserved 2022</p>
        </footer>

        <script src="./public/js/homepage.js"></script>
    </body>
</html>