<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="code.css"/>
    <title>Footgolf - Bevestig email</title>
</head>

<body>
<div class="container">
    <div class="forms-container">
        <!--Sign in form -->
        <div class="signin-signup">
            <form action="signin.php" class="sign-in-form" method="post">
            <?php
            session_start();
            //echo "<h2 class='title'>//Je hebt een link in// </h2>". $_SESSION['email']. " <h2 class='title'> gekregen om je account te activeren.</h2>";
            if (isset($_SESSION)) {
                error_reporting(E_ERROR | E_PARSE);
                $errors = $_SESSION['Errors'];
            }
            if (isset($_SESSION['Errors'])) {
                echo "<div class='error-text'>" . $errors . ". <br></div>";
            }
            unset($errors);
            unset($_SESSION['Errors']);
            ?>
            </form>
        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>Check uw inbox</h3>
                <p>
                    U heeft een email ontvangen, die heeft u nodig om in te loggen.
                </p>
                <img src="../../img/Footgolf-logo.png" class="image" id="image" alt=""/>
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

<div class="wrap">
    <div class="loading">
        <div class="bounceball"></div>
        <div class="text"></div>
    </div>
</div>
<script>

</script>
<script src="../../Javascript/app.js">
</script>
</body>
</html>