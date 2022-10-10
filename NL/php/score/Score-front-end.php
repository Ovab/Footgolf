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
        echo "<div class='title'><h1>Ghole </h1><h1>".$hole."</h1></div>";
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

        <div id="container">
            <div><button class="hideCards" onclick="hideCards()"><img src="../../../img/close.png"</button></div>
            <div class="container_boxes">
                <!-- Card 1 -->
                <div class="card card_1" id="card1">
                    <div class="image"></div>
                    <h2>Ghole 1</h2>
                    <!-- <p>Play the ball past or over the 2 obstacles. You can know yourself
                        how to pass it. Tip: Playing on the floor gives the least
                        risks.</p> -->
                    <p>Speel de bal voorbij of over de 2 obstacels. Tip: De bal voorbij de obstacels spelen geeft de
                        minste risico's.</p>
                    <div class="prev" onclick="prev()">PREV</div>
                    <div class="next" onclick="next()">NEXT</div>
                </div>

                <!-- Card 2 -->
                <div class="card card_2" id="card2">
                    <div class="image"></div>
                    <h2>Ghole 2</h2>
                    <!-- <p>Play the ball through the 3 concrete rings. OBSTACLE MUST BE TAKEN.
                        Tip: Try to play through the middle ring
                        so that the ball rolls directly into the hole.</p> -->
                    <p>Speel de bal door de 3 concrete ringen. DE OBSTACEELS MOETEN GENOMEN WORDEN. Tip: probeer de bal
                        door de middelste ring te spelen.</p>
                    <div class="prev" onclick="prev()">PREV</div>
                    <div class="next" onclick="next()">NEXT</div>
                </div>

                <!-- Card 3 -->
                <div class="card card_3" id="card3">
                    <div class="image"></div>
                    <h2>Ghole 3</h2>
                    <!-- <p>A real job for a left footed player. exterior
                        right is also possible of course.
                        Tip: Watch out for the ditches.</p> -->
                    <p>Echt een baan voor links benige mensen. buitenlangs recht is ook een mogelijkheid. Tip: kijk uit
                        voor kuilen.</p>
                    <div class="prev" onclick="prev()">PREV</div>
                    <div class="next" onclick="next()">NEXT</div>
                </div>

                <!-- Card 3 -->
                <div class="card card_4" id="card4">
                    <div class="image"></div>
                    <h2>Ghole 4</h2>
                    <!-- <p>Carefully play the ball Zig Zag along the fences. OBSTACLE MUST BE TAKEN.
                        Tip: Use the entire imaginary line of
                        the house to put your ball down.</p> -->
                    <p>Speel de bal voorzichtig zich zaggend langs de hekken. OBSTAKELS MOETEN GENOMEN WORDEN/ Tip: </p>
                    <div class="prev" onclick="prev()">PREV</div>
                    <div class="next" onclick="next()">NEXT</div>
                </div>

                <div class="card card_5" id="card5">
                    <div class="image"></div>
                    <h2>Ghole 5</h2>
                    <!-- <p>Just hit the ball for 100 meters.
                        Tip: Do not play the ball too much along the
                        left hand side.</p> -->
                    <p>Schiet de bal 100 meter ver. Tip: Schiet de bal niet te veel aan de linker kant.</p>
                    <div class="prev" onclick="prev()">PREV</div>
                    <div class="next" onclick="next()">NEXT</div>
                </div>

                <div class="card card_6" id="card6">
                    <div class="image"></div>
                    <h2>Ghole 6</h2>
                    <!-- <p>A precision track with 2 right angles. Play the ball along or over the logs.
                        Tip: Don't play the ball too hard, with flexibility
                        are you okay..</p> -->
                    <p>Een baan met twee rechten hoeken. Speel de bal langs of over de stammen. Tip: Schiet de bal niet
                        te hard</p>
                    <div class="prev" onclick="prev()">PREV</div>
                    <div class="next" onclick="next()">NEXT</div>
                </div>

                <div class="card card_7" id="card7">
                    <div class="image"></div>
                    <h2>Ghole 7</h2>
                    <!-- <p>A precision track with 2 right angles. Play the ball along or over the logs.
                        Tip: Don't play the ball too hard, with flexibility
                        you make it.</p> -->
                    <p>A precision track with 2 right angles. Play the ball along or over the logs.
                        Tip: Don't play the ball too hard, with flexibility
                        you make it.</p>
                    <div class="prev" onclick="prev()">PREV</div>
                    <div class="next" onclick="next()">NEXT</div>
                </div>

                <div class="card card_8" id="card8">
                    <div class="image"></div>
                    <h2>Ghole 8</h2>
                    <p>Pass the 3 wooden partitions in your own way and put the ball in the concrete ring.
                        Tip: Do not try from too great a distance
                        to walk.</p>
                    <div class="prev" onclick="prev()">PREV</div>
                    <div class="next" onclick="next()">NEXT</div>
                </div>

                <div class="card card_9" id="card9">
                    <div class="image"></div>
                    <h2>Ghole 9</h2>
                    <!-- <p>Pass the 3 wooden partitions in your own way and put the ball in the concrete ring.
                        Tip: Do not try from too great a distance
                        to walk.</p> -->
                    <p>Passeer de 3 houten partities op je eigen manier en stop de bal in de betonnen ring. Tip: Probeer
                        het niet van te ver.</p>
                    <div class="prev" onclick="prev()">PREV</div>
                    <div class="next" onclick="next()">NEXT</div>
                </div>

                <div class="card card_10" id="card10">
                    <div class="image"></div>
                    <h2>Ghole 10</h2>
                    <!-- <p>Play the ball over the water and then along or over the tree trunks.
                        Tip: First put the ball ready for the water,
                        across the water in 1 go is almost impossible.</p> -->
                    <p>Speel de bal over het water en dan langs de boom stronken. Tip: plaats de bal eerst klaar voor de
                        water obstakel</p>
                    <div class="prev" onclick="prev()">PREV</div>
                    <div class="next" onclick="next()">NEXT</div>
                </div>

                <div class="card card_11" id="card11">
                    <div class="image"></div>
                    <h2>Ghole 11</h2>
                    <!-- <p>Play the ball through i of the 3 tractor tires. OBSTACLE MUST BE TAKEN.
                        Tip: A 'Goal in One' is possible if you touch the ball
                        plays loud enough through the middle band.</p> -->
                    <p>Speel de bal door 1 van de 3 tractor banden. OBSTAKELS MOETEN GENOMEN WORDEN. Tip: </p>
                    <div class="prev" onclick="prev()">PREV</div>
                    <div class="next" onclick="next()">NEXT</div>
                </div>

                <div class="card card_12" id="card12">
                    <div class="image"></div>
                    <h2>Ghole 12</h2>
                    <!-- <p>Pass the ball under all the tree trunks. OBSTACLE MUST BE TAKEN.
                        Tip: Don't play the ball too hard.</p> -->
                    <p>Passeer de bal onder al de boom stonken. OBSTAKELS MOETEN GENOMEN WORDEN. Tip: Speel de bal niet
                        te hard.</p>
                    <div class="prev" onclick="prev()">PREV</div>
                    <div class="next" onclick="next()">NEXT</div>
                </div>

                <div class="card card_13" id="card13">
                    <div class="image"></div>
                    <h2>Ghole 13</h2>
                    <!-- <p>Pass the ball under all the tree trunks. OBSTACLE MUST BE TAKEN.
                        Tip: Don't play the ball too hard.</p> -->
                    <p></p>
                    <div class="prev" onclick="prev()">PREV</div>
                    <div class="next" onclick="next()">NEXT</div>
                </div>

                <div class="card card_14" id="card14">
                    <div class="image"></div>
                    <h2>Ghole 14</h2>
                    <!-- <p>Kick off on a raised platform towards the green.
                        Tip: Be careful when shooting from the
                        elevation.</p> -->
                    <p>Schiet van een verhoogd platform richting het groenen. Tip: Wees voorzichtig wanneer je op een
                        verhoging schiet.</p>
                    <div class="prev" onclick="prev()">PREV</div>
                    <div class="next" onclick="next()">NEXT</div>
                </div>

                <div class="card card_15" id="card15">
                    <div class="image"></div>
                    <h2>Ghole 15</h2>
                    <!-- <p>Play the ball along or over the logs.
                        Tip: Don't play the ball too hard.</p> -->
                    <p>Speel de bal over of langs de stronken. Tip: Schiet de bal niet te hard.</p>
                    <div class="prev" onclick="prev()">PREV</div>
                    <div class="next" onclick="next()">NEXT</div>
                </div>

                <div class="card card_16" id="card16">
                    <div class="image"></div>
                    <h2>Ghole 16</h2>
                    <!-- <p>The 'Goal in One' track.
                        Tip: By air is more likely than
                        on the ground.</p> -->
                    <p>De 'Goal in One' baan. Tip: Door de lucht lukt beter dan over de grond.</p>
                    <div class="prev" onclick="prev()">PREV</div>
                    <div class="next" onclick="next()">NEXT</div>
                </div>

                <div class="card card_17" id="card17">
                    <div class="image"></div>
                    <h2>Ghole 17</h2>
                    <!-- <p>A left and right leg job.
                        Tip: Just hit the ball.</p> -->
                    <p>Een baan voor links en rechts benige mensen. Tip: schiet de bal.</p>
                    <div class="prev" onclick="prev()">PREV</div>
                    <div class="next" onclick="next()">NEXT</div>
                </div>

                <div class="card card_18" id="card18">
                    <div class="image"></div>
                    <h2>Ghole 18</h2>
                    <!-- <p>Play the ball in or over the box with the orange posts. Then pick up the ball and place it on the
                        dot.
                        Tip: The ball serves the wall and the in 1 go
                        to pass goalkeeper.</p> -->
                    <p>Speel de bal over of in de doos met de oranje berichten. Pak daarna de bal op en leg hem op de
                        stip. Tip: </p>
                    <div class="prev" onclick="prev()">PREV</div>
                    <div class="next" onclick="next()">NEXT</div>
                </div>

            </div>
        </div>


        <script src='../../../EN/php/score/java.js'></script>
        <?php echo "<script>presetCards(".$_SESSION['cur_hole'].")</script>" ?>
    </div>
</body>

</html>