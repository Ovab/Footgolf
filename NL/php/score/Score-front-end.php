<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <meta charset="UTF-8">
    <title>Footgolf - Score</title>
    <link rel="stylesheet" href="style_score.css">
</head>
<body>
<div class="wrapper">
    <?php
    //resume / start sessie
    session_start();
    $hole = $_GET['hole'];
    $_SESSION["cur_hole"] = $hole;
    //zet php error reporting uit
    //error_reporting(E_ERROR | E_PARSE);
    //maar het session variable een normale voor reasons
    if (isset($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
        //Check of de session array bestaat, als dat zo is print de error
        if (isset($_SESSION['errors'])) {
            echo "<div class='error-text'>" . $errors . "</div>";
        }
        //variablen leeg maken zodat hij bij reload geen error meer heeft
        unset($errors);
        unset($_SESSION['errors']);
    }

    //variablen leeg makenca zodat hij bij reload geen error meer heeft
    unset($errors);
    unset($_SESSION['errors']);
    echo "<form action='score_register.php?hole=$hole' method='post'>";
    ?>

    <h2 class="title">Voer uw score in:</h2>
    <div class="input-field">
        <input placeholder="Score" type="number" inputmode="numeric" pattern="[0-9]*" name="speler_score"
               id="spelerScore">
    </div>
    <br>
    <input class="btn" type="submit" value="Verzenden">
    </form>
    <p id="score"></p>
    <!--Import jQuery -->
    <script src="../../Javascript/jquery.min.js"></script>
    <!--auto refresh script -->
    <script>
        function update_var() {
            jQuery.ajax({
                url: 'score_fetch.php', //Script URL.
                method: 'GET', //Methode data doorgeven
                success: function (answer) {
                    jQuery('#score').html(answer);//update your div with new content ....
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

    <?php $holes = $_SESSION['holes'];
    $nextHole = $hole + 1;
    $prevHole = $hole - 1;
    if ($hole != 1) {
        echo "<a href='Score-front-end.php?hole=$prevHole' ><input class='btn' type='submit' value='Vorige Hole' style='margin-top: 30%'></a>";
    }
    if ($holes - 1 >= $hole) {
        echo "<a href='Score-front-end.php?hole=$nextHole' ><input class='btn' type='submit' value='Volgende Hole'></a>";
    } else {
        echo "<a href='../../index.php'> <input class='btn' type='submit' value='Naar Home pagina'> </a> ";
    }
    ?>
</div>

<div class="slide-container">

    <div class="wrapper">
        <div class="clash-card barbarian">
            <div class="clash-card__image clash-card__image--barbarian">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/barbarian.png" alt="barbarian" />
            </div>
            <div class="clash-card__level clash-card__level--barbarian">Level 4</div>
            <div class="clash-card__unit-name">The Barbarian</div>
            <div class="clash-card__unit-description">
                The Barbarian is a kilt-clad Scottish warrior with an angry, battle-ready expression, hungry for destruction. He has Killer yellow horseshoe mustache.
            </div>

            <div class="clash-card__unit-stats clash-card__unit-stats--barbarian clearfix">
                <div class="one-third">
                    <div class="stat">20<sup>S</sup></div>
                    <div class="stat-value">Training</div>
                </div>

                <div class="one-third">
                    <div class="stat">16</div>
                    <div class="stat-value">Speed</div>
                </div>

                <div class="one-third no-border">
                    <div class="stat">150</div>
                    <div class="stat-value">Cost</div>
                </div>

            </div>

        </div> <!-- end clash-card barbarian-->
    </div> <!-- end wrapper -->

    <div class="wrapper">
        <div class="clash-card archer">
            <div class="clash-card__image clash-card__image--archer">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/archer.png" alt="archer" />
            </div>
            <div class="clash-card__level clash-card__level--archer">Level 5</div>
            <div class="clash-card__unit-name">The Archer</div>
            <div class="clash-card__unit-description">
                The Archer is a female warrior with sharp eyes. She wears a short, light green dress, a hooded cape, a leather belt and an attached small pouch.
            </div>

            <div class="clash-card__unit-stats clash-card__unit-stats--archer clearfix">
                <div class="one-third">
                    <div class="stat">25<sup>S</sup></div>
                    <div class="stat-value">Training</div>
                </div>

                <div class="one-third">
                    <div class="stat">24</div>
                    <div class="stat-value">Speed</div>
                </div>

                <div class="one-third no-border">
                    <div class="stat">300</div>
                    <div class="stat-value">Cost</div>
                </div>

            </div>
            
</body>
</html>
