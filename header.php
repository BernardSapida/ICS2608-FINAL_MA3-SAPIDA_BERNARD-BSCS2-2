<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <h3 class="text-white">HQuiz</h3>
                
                <?php
                    if($_SESSION["IS_LOGGED_IN"] == 0) {
                        echo '<ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="homepage.php">Homepage</a>
                                </li>
                            </ul>
                        <button class="btn btn-outline-light" id="btn-login" type="submit">Login</button>';
                    }
                ?>
            </div>
        </div>
    </nav>
</header>