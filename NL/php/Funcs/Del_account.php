<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/stylegroep.css" />
    <title>Footgolf - Verwijder acc</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <!--Sign in form -->
            <div class="signin-signup">
                <form action="del-back.php" class="sign-in-form" method="post">
                    <h2 class="title">Account verwijderen</h2>
                    <h3 style="color: #444">Jammer dat je je account wilt verwijderen, voer aub het email in wat
                        verbonden is met het account</h3>
                    <?php
                    session_start();
                    if (isset($_SESSION['errors'])) {
                        echo "<div class='error-text'>" . $_SESSION['errors'] . ". <br></div>";
                    }
                    unset($_SESSION['errors']);
                    ?>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="email" name="email" />
                    </div>
                    <label>Bevestig verijderen</label><input type="checkbox" class="btn" value="false" name="confirm">
                    <br>
                    <input type="submit" class="btn" value="Verwijder account" />
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