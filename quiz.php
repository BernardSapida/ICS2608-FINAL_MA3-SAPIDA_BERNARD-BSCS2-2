<?php
    error_reporting(0);

    session_start();

    if(empty($_SESSION["IS_LOGGED_IN"]) || $_SESSION["IS_LOGGED_IN"] == 0) header("Location: homepage.php");

    if(isset($_POST["submit"])) {
        $Q1_ANSWER = "PHP";
        $Q2_ANSWER = "JavaScript";
        $Q3_ANSWER = "False";
        $Q4_ANSWER = "True";
        $Q5_ANSWER = "Delimiter";
        $Q6_ANSWER = "Familiarity";

        $score = 0;

        $Q1_UserAnswer = $_POST["Q1"];
        $Q2_UserAnswer = $_POST["Q2"];
        $Q3_UserAnswer = $_POST["Q3"];
        $Q4_UserAnswer = $_POST["Q4"];
        $Q5_UserAnswer = $_POST["Q5"];
        $Q6_UserAnswer = $_POST["Q6"];

        $err_array = array();

        if(empty($Q1_UserAnswer)) array_push($err_array, "Question #1 is required!");
        if(empty($Q2_UserAnswer)) array_push($err_array, "Question #2 is required!");
        if(empty($Q3_UserAnswer)) array_push($err_array, "Question #3 is required!");
        if(empty($Q4_UserAnswer)) array_push($err_array, "Question #4 is required!");
        if(empty($Q5_UserAnswer)) array_push($err_array, "Question #5 is required!");
        if(empty($Q6_UserAnswer)) array_push($err_array, "Question #6 is required!");

        if(
            !empty($Q1_UserAnswer) && !empty($Q2_UserAnswer) && !empty($Q3_UserAnswer) &&
            !empty($Q4_UserAnswer) && !empty($Q5_UserAnswer) && !empty($Q6_UserAnswer)
        ) {
            if(strcmp($Q1_ANSWER, $Q1_UserAnswer) == 0) $score++;
            if(strcmp($Q2_ANSWER, $Q2_UserAnswer) == 0) $score++;
            if(strcmp($Q3_ANSWER, $Q3_UserAnswer) == 0) $score++;
            if(strcmp($Q4_ANSWER, $Q4_UserAnswer) == 0) $score++;
            if(strcmp($Q5_ANSWER, $Q5_UserAnswer) == 0) $score++;
            if(strcmp($Q6_ANSWER, $Q6_UserAnswer) == 0) $score++;

            $_SESSION["score"] = $score;
            $_SESSION["rating"] = round($_SESSION["score"]/6*100, 2);
            $_SESSION["remarks"] = ($_SESSION["rating"] > 60) ? "PASS" : "FAIL";
            $_SESSION["attempts"] -= 1;

            header("Location: quizresult.php");
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
        <title>HQuiz</title>
    </head>
    <body>
        <?php include_once "header.php" ?>
        <main>
            <section class="mx-auto my-5 p-4 rounded">
                <h1 class="text-center text-primary mb-3"><strong>Quiz</strong></h1>
                <?php
                    if(!empty($err_array)) echo '<div class="mb-3 bg-danger text-white p-3 rounded">' . $err_array[0] . '</div>';
                ?>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="POST">
                    <!-- Multiple Choice -->
                    <div class="p-4 rounded mb-3">
                        <p>1) It is an open-source server-side scripting language. Specifically designed to fill the gap between static HTML pages and fully dynamic pages, such as those generated through CGI code.</p>
                        <hr>
                        <div class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Q1" id="Q1_A" value="Statements" <?php if(strcmp($Q1_UserAnswer, "Statements") == 0) echo "checked" ?>>
                                <label class="form-check-label" for="Q1_A">A) Statements</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Q1" id="Q1_B" value="Functions" <?php if(strcmp($Q1_UserAnswer, "Functions") == 0) echo "checked" ?>>
                                <label class="form-check-label" for="Q1_B">B) Functions</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Q1" id="Q1_C" value="PHP" <?php if(strcmp($Q1_UserAnswer, "PHP") == 0) echo "checked" ?>>
                                <label class="form-check-label" for="Q1_C">C) PHP</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Q1" id="Q1_D" value="Programming Language Construct" <?php if(strcmp($Q1_UserAnswer, "Programming Language Construct") == 0) echo "checked" ?>>
                                <label class="form-check-label" for="Q1_D">D) Programming Language Construct</label>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 rounded mb-3">
                        <p>2) This was designed with the purpose to make web pages dynamic and more interactive. It is platform independent which means it can run on any operating system.</p>
                        <hr>
                        <div class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Q2" id="Q2_A" value="JavaScript" <?php if(strcmp($Q2_UserAnswer, "JavaScript") == 0) echo "checked" ?>>
                                <label class="form-check-label" for="Q2_A">A) JavaScript</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Q2" id="Q2_B" value="PHP" <?php if(strcmp($Q2_UserAnswer, "PHP") == 0) echo "checked" ?>>
                                <label class="form-check-label" for="Q2_B">B) PHP</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Q2" id="Q2_C" value="HTML" <?php if(strcmp($Q2_UserAnswer, "HTML") == 0) echo "checked" ?>>
                                <label class="form-check-label" for="Q2_C">C) HTML</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Q2" id="Q2_D" value="CPP" <?php if(strcmp($Q2_UserAnswer, "CPP") == 0) echo "checked" ?>>
                                <label class="form-check-label" for="Q2_D">D) C++</label>
                            </div>
                        </div>
                    </div>

                    <!-- True or False -->
                    <div class="p-4 rounded mb-3">
                        <p>3) Brendon Aich created JavaScript in September 1995.</p>
                        <hr>
                        <div class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Q3" id="Q3_A" value="True" <?php if(strcmp($Q3_UserAnswer, "True") == 0) echo "checked" ?>>
                                <label class="form-check-label" for="Q3_A">A) True</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Q3" id="Q3_B" value="False" <?php if(strcmp($Q3_UserAnswer, "False") == 0) echo "checked" ?>>
                                <label class="form-check-label" for="Q3_B">B) False</label>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 rounded mb-3">
                        <p>4) Using PHP, you can restrict users to access some pages of your website.</p>
                        <hr>
                        <div class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Q4" id="Q4_A" value="True" <?php if(strcmp($Q4_UserAnswer, "True") == 0) echo "checked" ?>>
                                <label class="form-check-label" for="Q4_A">A) True</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Q4" id="Q4_B" value="False" <?php if(strcmp($Q4_UserAnswer, "False") == 0) echo "checked" ?>>
                                <label class="form-check-label" for="Q4_B">B) False</label>
                            </div>
                        </div>
                    </div>

                    <!-- Fill in the blanks -->
                    <div class="p-4 rounded mb-3">
                        <p>5) ___________ is a character or sequence of characters used to mark the beginning and end of a code segment.</p>
                        <hr>
                        <div class="mb-2 row">
                            <div class="col-sm-10 w-100">
                                <input type="text" class="form-control" name="Q5" id="Q5" placeholder="Type your answer" aria-label="Q5" value="<?php echo (isset($Q5_UserAnswer)) ? $Q5_UserAnswer : ""; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="p-4 rounded mb-3">
                        <p>6) Simplicity, efficiency, security, flexibility, and __________ are the characteristics of PHP.</p>
                        <hr>
                        <div class="mb-2 row">
                            <div class="col-sm-10 w-100">
                                <input type="text" class="form-control" name="Q6" id="Q6" placeholder="Type your answer" aria-label="Q6" value="<?php echo (isset($Q6_UserAnswer)) ? $Q6_UserAnswer : ""; ?>">
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-dark w-100" aria-label="submit">Submit Quiz</button>
                </form>
            </section>
        </main>
    </body>
</html>