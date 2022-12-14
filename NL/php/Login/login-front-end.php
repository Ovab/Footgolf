<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/login.css" />
    <title>Footgolf - Log in / Sign up</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <!--Sign in form -->
            <div class="signin-signup">
                <form action="signin.php" class="sign-in-form" method="post">
                    <h2 class="title">Log in</h2>
                    <?php
                    //resume / start sessie
                    session_start();
                    //zet php error reporting uit
                    //error_reporting(E_ERROR | E_PARSE);
                    //Check of de session array bestaat, als dat zo is print de error
                    if (isset($_SESSION['errors'])) {
                        $errors = $_SESSION['errors'];
                        echo "<div class='error-text'>" . $errors . "</div>";
                    }
                    //variablen leeg maken just in case
                    unset($errors);
                    unset($_SESSION['errors'])
                    //eind PHP code
                    ?>

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="email" name="speler-email" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-phone"></i>
                        <input type="text" inputmode="numeric" pattern="[0-9]*" placeholder="06-nummer"
                            name="speler-nummer" />
                    </div>
                    <input type="submit" class="btn" value="Log in" style="background-color: #23A455" />
                </form>
                <!-- Signup form  -->
                <form action="email.php" class="sign-up-form" method="post">
                    <h2 class="title">Registreer</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Spelernaam" name="speler-naam" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" name="speler-email" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-phone"></i>
                        <input type="number" inputmode="numeric" pattern="[0-9]*" placeholder="06-nummer"
                            name="speler-nummer" />
                    </div>
                    <input type="submit" class="btn" value="Registreer" style="background-color: #23A455" />
                    <img src="../../img/footgolf5.png" class="image2" alt="Footgolf logo">
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Nieuw hier?</h3>
                    <p>
                        Registreer nu om de ultieme Footgolf ervaring te beleven?
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Registreer
                    </button>
                    <!-- <img src="../../img/Footgolf-logo.png" class="image" id="image" alt="" /> -->
                </div>
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Een van ons?</h3>
                    <p>
                        Log in, om weer de leukste ervaring te beleven!
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Log in
                    </button>


                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
    <script src="../../Javascript/app.js">
    </script>
</body>

</html>