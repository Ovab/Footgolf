<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../stylegroep.css"/>
    <title>Footgolf - Verwijder acc</title>
</head>

<body>
<div class="container">
    <div class="forms-container">
        <!--Sign in form -->
        <div class="signin-signup">
            <form action="../Login/code_enter-back.php" class="sign-in-form" method="post">
                <h2 class="title">Wat is het email wat ge linkt is aan het account?</h2>


                <?php
                session_start();
                if (isset($_SESSION['Errors'])) {
                    echo "<div class='error-text'>" . $_SESSION['Errors'] . ". <br></div>";
                }
                unset($_SESSION['Errors']);
                ?>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <form method="post" action="del-acc-mail.php">
                        <input type="text" placeholder="E-mail" name="email"/>
                </div>
                <input type="submit" class="btn" value="Submit"/>
            </form>
            <p id="pc"></p>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Een van ons?</h3>
                    <p>
                        Log in, om weer de leukste ervaring te beleven!
                    </p>
                    <button class="btn transparent" id="sign-in-btn">Join</button>

                    <script src="../../Javascript/app.js"></script>
</body>
<script src='../../Javascript/jquery.min.js'></script>
</html>