<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <h3>PHP&JS Quiz</h3>
                
                <?php
                    error_reporting(0);

                    if($_SESSION["VALID_CREDENTIAL"] == 0) {
                        echo '<ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="homepage.php">Homepage</a>
                                </li>
                            </ul>
                        <button class="btn btn-outline-dark" id="btn-login" type="submit">Login</button>';
                    }
                ?>
            </div>
        </div>
    </nav>
</header>