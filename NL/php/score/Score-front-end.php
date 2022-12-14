<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
    <meta charset="UTF-8">
    <title>Footgolf - Score</title>
    <link rel="stylesheet" href="../../css/style_score.css">
</head>

<body>
    <div class="wrapper">
        <?php
        //resume / start sessie
        session_start();
        $hole = $_GET['hole'];
        $_SESSION["cur_hole"] = $hole;
        echo "<div class='title'><h1>Ghole </h1><h1>" . $hole . "</h1></div>";
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
            <input placeholder="Score" type="number" inputmode="numeric" pattern="[0-9]*" minlength="1" maxlength="2"
                min="1" max="10" name="speler_score" id="spelerScore">
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
                success: function(answer) {
                    jQuery('#score').html(answer); //update your div with new content ....
                },
                error: function() {
                    //Iets ging fout, niet sure wat tho
                    alert("Onbekende error met refreshen, refresh weer over 2.7 sec");
                }
            });
        }

        update_var()
        //Call de functie elke ~2.7 sec
        setInterval(function() {
            update_var()
        }, 2700);
        </script>

        <?php $holes = $_SESSION['holes'];
        $nextHole = $hole + 1;
        $prevHole = $hole - 1;
        if ($hole != 1) {
            echo "<a href='Score-front-end.php?hole=$prevHole' ><input class='btn' type='submit' value='Vorige Hole'></a>";
        }
        if ($holes - 1 >= $hole) {
            echo "<a href='Score-front-end.php?hole=$nextHole' ><input class='btn' type='submit' value='Volgende Hole'></a>";
        } else {
            echo "<a href='../../leaderboard/Teamleaderboard.php'> <input class='btn' type='submit' value='Naar teamscores'> </a> ";
        }
        ?>

        <div class="showCards"><button class="btn" onclick="showCards()">Laat uitleg zien</button></div>
        <?php echo "<a href='../../index.php' ><input class='btn margin-top' type='submit' value='Home'></a>"; ?>

        <div class="pop_up">
            <div class="pop_up_wrapper">
                <img class="pop_up_img" src="" alt="">
                <div class="pop_up_content"></div>
                <div class="social_media_btns">
                    <div class="social_media_btn">
                        <img src="../../../img/img/facebook (1).png" alt="facebook link">
                        <a href="https://m.facebook.com/foogolfnl/" class="social_media_text_box">Check out our
                            Facebook!</a>
                    </div>
                    <div class="social_media_btn">
                        <img src="../../../img/img/instagram (3).png" alt="instagram link">
                        <a href="https://instagram.com/footgolfnl?igshid=YmMyMTA2M2Y="
                            class="social_media_text_box">Check out our Instagram!</a>
                    </div>
                </div>
                <button class="hideCards" onclick="closePopUp()"><img src="../../../img/close.png" /></button>
            </div>
        </div>

        <div class="overlay"></div>

        <div id="container">
            <div><button class="hideCards" onclick="hideCards()"><img src="../../../img/close.png" /></button></div>
            <div class="container_boxes">
                <?php
                for ($i = 1; $i <= $_SESSION["holes"]; $i++) {
                    echo "<div class='card card_$i' id='card$i'>";
                    echo "<div class='image'></div>";
                    echo "<h2>Ghole $i</h2>";
                    echo "<p class='card_text'>Speel de bal voorbij of over de 2 obstacels. Tip: De bal voorbij de obstacels spelen geeft de
                    minste risico's.</p>";
                    echo "<div class='prev' onclick='prev()'>PREV</div>";
                    echo "<div class='next' onclick='next()'>NEXT</div>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>

        <script src='../../Javascript/gholes.js'></script>
        <?php
        echo "<script>presetCards(" . $_SESSION['cur_hole'] . ")</script>";
        $data = $_SESSION["data"];
        echo "<script>
        getData($data);
        insertData(data);
        </script>";
        // check if $_SESSION["popUpCount"] exits, if not create it
        $_SESSION["popUpCount"] = array();
        if (!isset($_SESSION["popUpCount"])) {
        }

        for ($i = 0; $i <= $_SESSION["holes"]; $i++) {
            if ($_SESSION["cur_hole"] == $i && !in_array($_SESSION["cur_hole"], $_SESSION['popUpCount'])) {
                echo "<script>showPopUp(" . $_SESSION["cur_hole"] . ")</script>";
                array_push($_SESSION["popUpCount"], $_SESSION["cur_hole"]);
            }
        }
        // print_r($_SESSION["array"]);
        ?>
    </div>
</body>

</html>