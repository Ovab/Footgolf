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
    <h2 class="title">Insert your score</h2>
    <div class="input-field">
        <input placeholder="Score" type="number" inputmode="numeric" pattern="[0-9]*" name="speler_score"
               id="spelerScore">
    </div>
    <br>
    <input class="btn" type="submit" value="Submit">
    </form>
    <p id="score"></p>
    <!--Import jQuery -->
    <script src="../../Javascript/jquery.min.js"></script>
    <!--auto refresh script -->
    <script>
        //maak functie aan.
        function update_var() {
            jQuery.ajax({
                url: 'score_fetch.php', //Script URL.
                method: 'GET', //Methode data doorgeven
                success: function (answer) {
                    jQuery('#score').html(answer);//update your div with new content ....
                },
                error: function () {
                    //Iets ging fout, niet sure wat tho
                    alert("Something went wrong, refreshing again in ~3 sec");
                }
            });
        }
        update_var()
        //Call de functie elke ~2.7 sec
        setInterval(function () {
            update_var()
        }, 2700);
    </script>

    <?php $holes = $_SESSION['holes']; $nextHole=$hole+1; $prevHole=$hole-1;
    if ($holes-1>=$hole && $holes-1<=1) {
        echo "<a href='Score-front-end.php?hole=$prevHole' ><input class='btn' type='submit' value='Previous Hole' style='margin-top: 30%'></a>";
    }
    if ($holes-1>=$hole) {
        echo "<a href='Score-front-end.php?hole=$nextHole' ><input class='btn' type='submit' value='Next Hole'></a>";
    }
    else{
        echo "<a href='../../index.php'> <input class='btn' type='submit' value='Home Page'> </a> ";
    }
    ?>
</div>
</body>
</html>
