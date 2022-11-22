<?php
    session_start();

    // Uncomment this if youn want to reset attempts to 3
    // $_SESSION["attempts"] = 3;

    if(!isset($_SESSION["attempts"])) $_SESSION["attempts"] = 3;
    if(!empty($_SESSION["VALID_CREDENTIAL"]) && $_SESSION["VALID_CREDENTIAL"] == 1) header("Location: quiz.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="./public/css/design.css">
        <title>PHP&JS Quiz</title>
    </head>
    <body>
        <?php include_once "header.php" ?>

        <main>
            <section>
                <img src="./public/images/homepage.jpg" alt="Homepage Background">
                <div class="my-5 mx-auto text-center">
                    <h1><strong>About the Quiz</strong></h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium ea dolores excepturi molestias voluptatibus quam eum nemo animi delectus! Ipsam at sapiente magnam provident nostrum ullam nam voluptatem culpa ipsum!</p>
                    <hr class="my-5">
                    <h1><strong>About the Quiz</strong></h1>
                    <div>
                        <div>
                            <img src="./public/images/1.png" alt="1">
                            <p class="fs-3">Multiple Choice</p>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat, sit.</p>
                        </div>
                        <div>
                            <img src="./public/images/2.png" alt="2">
                            <p class="fs-3">True or False</p>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat, sit.</p>
                        </div>
                        <div>
                            <img src="./public/images/3.png" alt="3">
                            <p class="fs-3">Fill-in the blanks</p>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat, sit.</p>
                        </div>
                    </div>
                    <br>
                    <button class="py-2 px-3 rounded btn-start text-light mx-auto" id="btn-start">Login to Start</button>
                </div>
            </section>
        </main>
        <hr class="m-0">
        <footer class="p-3 w-100">
            <p class="m-0 text-center text-dark">Copyright &copy; 2022 PHP&JS Quiz. All rights reserved.</p>
        </footer>
        <script src="./public/js/homepage.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>