<?php
    error_reporting(0);
    session_start();

    if(!empty($_SESSION["VALID_CREDENTIAL"]) && $_SESSION["VALID_CREDENTIAL"] == 1) header("Location: quiz.php");
    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $err = "";

        if($_SESSION["attempts"] > 0) {
            if(strcmp($username, "ICS2608") == 0 && strcmp($password, "correct") == 0) {
                $_SESSION["VALID_CREDENTIAL"] = 1;
                header("Location: quiz.php");
            } else {
                if(strcmp($username, "ICS2608") != 0) $err = "Your username is incorrect!";
                else if(strcmp($password, "correct") != 0) $err = "Your password is incorrect!";
            }
        } else $err = "You don't have enough attempts!";
    }
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="./public/css/log.css">
        <title>PHP&JS Quiz</title>
    </head>
    <body>
        <?php include_once "header.php" ?>

        <main>
            <section class="mx-auto my-5 p-5 rounded">
                <h2><strong>Login your account</strong></h2>
                <h5 class="mb-3">Remaining Attempts: <?php echo $_SESSION["attempts"] ?></h5>
                <?php if(!empty($err)) echo '<div class="mb-3 bg-danger text-white p-3 rounded">' . $err . '</div>'; ?>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo (isset($username)) ? $username : "" ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo (isset($password)) ? $password : "" ?>">
                    </div>
                    <button type="submit" name="login" class="btn btn-primary w-100" aria-label="login">Login</button>
                </form>
            </section>
        </main>
        <script src="./public/js/homepage.js"></script>
    </body>
</html>