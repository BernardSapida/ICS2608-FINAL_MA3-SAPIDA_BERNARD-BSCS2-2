<?php
    session_start();

    if(empty($_SESSION["IS_LOGGED_IN"]) || $_SESSION["IS_LOGGED_IN"] == 0) header("Location: homepage.php");

    if(isset($_POST["btn-back"])) {
        $_SESSION["IS_LOGGED_IN"] = 0;
        header("Location: homepage.php");
    }
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="./public/css/quizResult.css">
        <title>HQuiz</title>
    </head>
    <body>
        <?php include_once "header.php" ?>
        
        <main>
            <section class="mx-auto my-5 p-4 rounded">
                <h2><strong>Quiz Result</strong></h2>
                <hr>
                <p class="fs-4">Total Number of Items: <strong>6</strong></p>
                <p class="fs-4">Total Correct Items: <strong><?php echo $_SESSION["score"] ?></strong></p>
                <p class="fs-4">Rating: <strong><?php echo $_SESSION["rating"] ?>%</strong></p>
                <p class="fs-4">Remarks: <strong class="<?php echo strcmp($_SESSION["remarks"], "PASS") == 0 ? "text-success" : "text-danger" ?>"><?php echo $_SESSION["remarks"] ?></strong></p>
                <hr>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="POST">
                    <button type="submit" name="btn-back" id="btn-back" class="btn btn-dark w-100" aria-label="button">Go to Homepage</button>
                </form>
            </section>
        </main>
    </body>
</html>