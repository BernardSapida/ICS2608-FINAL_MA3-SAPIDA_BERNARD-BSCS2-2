<?php
    error_reporting(0);
    session_start();
    if(empty($_SESSION["VALID_CREDENTIAL"]) || $_SESSION["VALID_CREDENTIAL"] == 0) header("Location: homepage.php");

    if(isset($_POST["submit"])) {
        $quizScore = 0;
        $Question1_ANSWER = "SERVER";
        $Question2_ANSWER = "Delimiter";
        $Question3_ANSWER = "True";
        $Question4_ANSWER = "False";
        $Question5_ANSWER = "Inline";
        $Question6_ANSWER = "Equal";
        $Question1_UserAnswer = $_POST["Question1"];
        $Question2_UserAnswer = $_POST["Question2"];
        $Question3_UserAnswer = $_POST["Question3"];
        $Question4_UserAnswer = $_POST["Question4"];
        $Question5_UserAnswer = $_POST["Question5"];
        $Question6_UserAnswer = $_POST["Question6"];
        $errMessage = "";

        if(!empty($Question1_UserAnswer) && !empty($Question2_UserAnswer) && !empty($Question3_UserAnswer) && !empty($Question4_UserAnswer) && !empty($Question5_UserAnswer) && !empty($Question6_UserAnswer) ) {
            if(strcasecmp($Question1_ANSWER, $Question1_UserAnswer) == 0) $quizScore++;
            if(strcasecmp($Question2_ANSWER, $Question2_UserAnswer) == 0) $quizScore++;
            if(strcasecmp($Question3_ANSWER, $Question3_UserAnswer) == 0) $quizScore++;
            if(strcasecmp($Question4_ANSWER, $Question4_UserAnswer) == 0) $quizScore++;
            if(strcasecmp($Question5_ANSWER, $Question5_UserAnswer) == 0) $quizScore++;
            if(strcasecmp($Question6_ANSWER, $Question6_UserAnswer) == 0) $quizScore++;

            $_SESSION["quizScore"] = $quizScore;
            $_SESSION["rating"] = round($_SESSION["quizScore"]/6*100, 2);
            $_SESSION["remarks"] = ($_SESSION["rating"] > 60) ? "PASS" : "FAIL";
            $_SESSION["attempts"] -= 1;

            header("Location: quizresult.php");
        } else {
            $errMessage = "All questions are required!";
        }
    }
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="./public/css/quiz.css">
        <title>PHP&JS Quiz</title>
    </head>
    <body>
        <?php include_once "header.php" ?>
        <main>
            <section class="mx-auto my-5 p-4 rounded">
                <h1 class="text-center f1-2"><strong>PHP&JS Quiz</strong></h1>
                <hr class="my-4">
                <?php
                    if(!empty($errMessage)) echo '<div class="mb-3 bg-danger text-white p-3 rounded">' . $errMessage . '</div>';
                ?>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="POST">
                    <!-- Multiple Choice -->
                    <div class="p-4 rounded mb-3">
                        <p><span class="text-danger fs-3">Q.</span> 1) An array of information about the Web server that served the current script.</p>
                        <hr>
                        <div class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Question1" id="Question1_A" value="REQUEST" <?php if(strcasecmp($Question1_UserAnswer, "REQUEST") == 0) echo "checked" ?>>
                                <label class="form-check-label" for="Question1_A">A) $_REQUEST</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Question1" id="Question1_B" value="SESSION" <?php if(strcasecmp($Question1_UserAnswer, "SESSION") == 0) echo "checked" ?>>
                                <label class="form-check-label" for="Question1_B">B) $_SESSION</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Question1" id="Question1_C" value="GLOBALS" <?php if(strcasecmp($Question1_UserAnswer, "GLOBALS") == 0) echo "checked" ?>>
                                <label class="form-check-label" for="Question1_C">C) $GLOBALS</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Question1" id="Question1_D" value="SERVER" <?php if(strcasecmp($Question1_UserAnswer, "SERVER") == 0) echo "checked" ?>>
                                <label class="form-check-label" for="Question1_D">D) $_SERVER</label>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 rounded mb-3">
                        <p><span class="text-danger fs-3">Q.</span> 2) A character or sequence of characters used to mark the beginning and end of a code segment.</p>
                        <hr>
                        <div class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Question2" id="Question2_A" value="Function" <?php if(strcasecmp($Q2_UserAnswer, "Function") == 0) echo "checked" ?>>
                                <label class="form-check-label" for="Question2_A">A) Function</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Question2" id="Question2_B" value="Syntax" <?php if(strcasecmp($Q2_UserAnswer, "Syntax") == 0) echo "checked" ?>>
                                <label class="form-check-label" for="Question2_B">B) Syntax</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Question2" id="Question2_C" value="Delimiter" <?php if(strcasecmp($Question2_UserAnswer, "Delimiter") == 0) echo "checked" ?>>
                                <label class="form-check-label" for="Question2_C">C) Delimiter</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Question2" id="Question2_D" value="Statements" <?php if(strcasecmp($Question2_UserAnswer, "Statements") == 0) echo "checked" ?>>
                                <label class="form-check-label" for="Question2_D">D) Statements</label>
                            </div>
                        </div>
                    </div>

                    <!-- True or False -->
                    <div class="p-4 rounded mb-3">
                        <p><span class="text-danger fs-3">Q.</span> 3) PHP is whitespace insensitive.</p>
                        <hr>
                        <div class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Question3" id="Question3_A" value="True" <?php if(strcasecmp($Question3_UserAnswer, "True") == 0) echo "checked" ?>>
                                <label class="form-check-label" for="Question3_A">A) True</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Question3" id="Question3_B" value="False" <?php if(strcasecmp($Question3_UserAnswer, "False") == 0) echo "checked" ?>>
                                <label class="form-check-label" for="Question3_B">B) False</label>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 rounded mb-3">
                        <p><span class="text-danger fs-3">Q.</span> 4) Using PHP, you can restrict users to access some pages of your website.</p>
                        <hr>
                        <div class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Question4" id="Question4_A" value="True" <?php if(strcasecmp($Question4_UserAnswer, "True") == 0) echo "checked" ?>>
                                <label class="form-check-label" for="Question4_A">A) True</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Question4" id="Question4_B" value="False" <?php if(strcasecmp($Question4_UserAnswer, "False") == 0) echo "checked" ?>>
                                <label class="form-check-label" for="Question4_B">B) False</label>
                            </div>
                        </div>
                    </div>

                    <!-- Fill in the blanks -->
                    <div class="p-4 rounded mb-3">
                        <p><span class="text-danger fs-3">Q.</span> 5) _______ Javascript refers to the practice of including Javascript code directly within certain HTML attributes.</p>
                        <hr>
                        <div class="mb-2 row">
                            <div class="col-sm-10 w-100">
                                <input type="text" class="form-control" name="Question5" id="Question5" placeholder="Type your answer" aria-label="Question5" value="<?php echo (isset($Question5_UserAnswer)) ? $Question5_UserAnswer : ""; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="p-4 rounded mb-3">
                        <p><span class="text-danger fs-3">Q.</span> 6) In adding a method attribute, element name is separated from the value by a/an _______ sign.</p>
                        <hr>
                        <div class="mb-2 row">
                            <div class="col-sm-10 w-100">
                                <input type="text" class="form-control" name="Question6" id="Question6" placeholder="Type your answer" aria-label="Question6" value="<?php echo (isset($Question6_UserAnswer)) ? $Question6_UserAnswer : ""; ?>">
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary w-100" aria-label="submit">Submit Quiz</button>
                </form>
            </section>
        </main>
    </body>
</html>