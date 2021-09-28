<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../stylegroep.css"/>
    <title>Footgolf - Groep Join</title>
</head>

<body>
<div class="container">
    <div class="forms-container">
        <!--Sign in form -->
        <div class="signin-signup">
            <form action="join_group_backend.php" class="sign-in-form" method="post">
                <h2 class="title">Voer Game Code </h2>

                <?php
                session_start();
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
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="text" inputmode="numeric" pattern="[0-9]*" placeholder="GameCode" name="GroepID"/>
                </div>
                <input type="submit" class="btn" value="Join groep"/>
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
<script>
    //maak functie aan.
    function update_var() {
        jQuery.ajax({
            url: 'pc-fetch.php', //Script URL.
            method: 'POST', //Methode data doorgeven
            success: function (answer) {
                jQuery('#pc').html(answer);//update your div with new content ....
            },
            error: function () {
                //Iets ging fout, niet sure wat tho
                alert("Onbekende error met refreshen, refresh weer over 2.7 sec");
            }
        });
    }

    update_var()
    //Call de functie elke ~2.7 sec
    setInterval(function () {
        update_var()
    }, 2700);
</script>
</html>
