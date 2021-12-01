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

    <?php $holes = $_SESSION['holes'];
    $nextHole = $hole + 1;
    $prevHole = $hole - 1;
    if ($holes - 1 >= $hole && $holes - 1 <= 1) {
        echo "<a href='Score-front-end.php?hole=$prevHole' ><input class='btn' type='submit' value='Previous Hole' style='margin-top: 30%'></a>";
    }
    if ($holes - 1 >= $hole) {
        echo "<a href='Score-front-end.php?hole=$nextHole' ><input class='btn' type='submit' value='Next Hole'></a>";
    } else {
        echo "<a href='../../index.php'> <input class='btn' type='submit' value='Home Page'> </a> ";
    }
    ?>

    <div id="container">
        <div class="container_boxes">
            <!-- Card 1 -->
            <div class="card card_1" id="card1">
                <div class="image"></div>
                <h2>Ghole 1</h2>
                <p>Speel de bal langs of over de 2 obstakels. Je mag zelf weten
                    hoe je deze passeert. Tip: Over de grond spelen geeft de minste
                    risico's.</p>
                <div class="prev" onclick="prev()">PREV</div>
                <div class="next" onclick="next()">NEXT</div>
            </div>

            <!-- Card 2 -->
            <div class="card card_2" id="card2">
                <div class="image"></div>
                <h2>Ghole 2</h2>
                <p>Speel de bal doori van de 3 betonnen ringen. HINDERNIS MOET GENOMEN WORDEN.
                    Tip: Probeer door de middelste ring te spelen
                    zodat de bal direct in de hole rolt.</p>
                <div class="prev" onclick="prev()">PREV</div>
                <div class="next" onclick="next()">NEXT</div>
            </div>

            <!-- Card 3 -->
            <div class="card card_3" id="card3">
                <div class="image"></div>
                <h2>Ghole 3</h2>
                <p>Een echte baan voor een linksbenige speler. Buitenkant
                    rechts kan ook natuurlijk.
                    Tip: Pas op voor de greppels.</p>
                <div class="prev" onclick="prev()">PREV</div>
                <div class="next" onclick="next()">NEXT</div>
            </div>

            <!-- Card 3 -->
            <div class="card card_4" id="card4">
                <div class="image"></div>
                <h2>Ghole 4</h2>
                <p>Speel de bal voorzichtig Zig Zag langs de hekjes. HINDERNIS MOET GENOMEN WORDEN.
                    Tip: Gebruik de gehele denkbeeldige lijn van
                    het huisje om je bal neer te leggen.</p>
                <div class="prev" onclick="prev()">PREV</div>
                <div class="next" onclick="next()">NEXT</div>
            </div>

            <div class="card card_5" id="card5">
                <div class="image"></div>
                <h2>Ghole 5</h2>
                <p>Gewoon lekker 100 meter knallen tegen de bal.
                    Tip: Speel de bal niet te veel langs de
                    linkerkant.</p>
                <div class="prev" onclick="prev()">PREV</div>
                <div class="next" onclick="next()">NEXT</div>
            </div>

            <div class="card card_6" id="card6">
                <div class="image"></div>
                <h2>Ghole 6</h2>
                <p>Een precisie baan met 2 haakse hoeken. Speel de bal langs of over de boomstammen.
                    Tip: Speel de bal niet te hard, met souplesse
                    red je het..</p>
                <div class="prev" onclick="prev()">PREV</div>
                <div class="next" onclick="next()">NEXT</div>
            </div>

            <div class="card card_7" id="card7">
                <div class="image"></div>
                <h2>Ghole 7</h2>
                <p>Een precisie baan met 2 haakse hoeken. Speel de bal langs of over de boomstammen.
                    Tip: Speel de bal niet te hard, met souplesse
                    red je het.</p>
                <div class="prev" onclick="prev()">PREV</div>
                <div class="next" onclick="next()">NEXT</div>
            </div>

            <div class="card card_8" id="card8">
                <div class="image"></div>
                <h2>Ghole 8</h2>
                <p>Passeer de 3 houten schotten op je eigen manier en putt de bal in de betonnen ring.
                    Tip: Probeer niet van een te grote afstand
                    te loppen.</p>
                <div class="prev" onclick="prev()">PREV</div>
                <div class="next" onclick="next()">NEXT</div>
            </div>

            <div class="card card_9" id="card9">
                <div class="image"></div>
                <h2>Ghole 9</h2>
                <p>Passeer de 3 houten schotten op je eigen manier en putt de bal in de betonnen ring.
                    Tip: Probeer niet van een te grote afstand
                    te loppen.</p>
                <div class="prev" onclick="prev()">PREV</div>
                <div class="next" onclick="next()">NEXT</div>
            </div>

            <div class="card card_10" id="card10">
                <div class="image"></div>
                <h2>Ghole 10</h2>
                <p>Speel de bal over het water en daarna langs of over de boomstammen.
                    Tip: Leg de bal eerst voor het water klaar,
                    in 1 keer over het water lukt bijna niet.</p>
                <div class="prev" onclick="prev()">PREV</div>
                <div class="next" onclick="next()">NEXT</div>
            </div>

            <div class="card card_11" id="card11">
                <div class="image"></div>
                <h2>Ghole 11</h2>
                <p>Speel de bal door i van de 3 trekker banden. HINDERNIS MOET GENOMEN WORDEN.
                    Tip: Een 'Goal in One' is mogelijk als je de bal
                    hard genoeg door de middelste band speelt.</p>
                <div class="prev" onclick="prev()">PREV</div>
                <div class="next" onclick="next()">NEXT</div>
            </div>

            <div class="card card_12" id="card12">
                <div class="image"></div>
                <h2>Ghole 12</h2>
                <p>Speel de bal onder alle boom- stammen door. HINDERNIS MOET GENOMEN WORDEN.
                    Tip: Speel de bal niet te hard.</p>
                <div class="prev" onclick="prev()">PREV</div>
                <div class="next" onclick="next()">NEXT</div>
            </div>

            <div class="card card_13" id="card13">
                <div class="image"></div>
                <h2>Ghole 13</h2>
                <p>Speel de bal onder alle boomstammen door. HINDERNIS MOET GENOMEN WORDEN.
                    Tip: Speel de bal niet te hard.</p>
                <div class="prev" onclick="prev()">PREV</div>
                <div class="next" onclick="next()">NEXT</div>
            </div>

            <div class="card card_14" id="card14">
                <div class="image"></div>
                <h2>Ghole 14</h2>
                <p>Op een verhoogd plateau aftrappen richting de green.
                    Tip: Wees voorzichtig met schieten vanaf de
                    verhoging.</p>
                <div class="prev" onclick="prev()">PREV</div>
                <div class="next" onclick="next()">NEXT</div>
            </div>

            <div class="card card_15" id="card15">
                <div class="image"></div>
                <h2>Ghole 15</h2>
                <p>Speel de bal langs of over de boomstammen.
                    Tip: Speel de bal niet te hard.</p>
                <div class="prev" onclick="prev()">PREV</div>
                <div class="next" onclick="next()">NEXT</div>
            </div>

            <div class="card card_16" id="card16">
                <div class="image"></div>
                <h2>Ghole 16</h2>
                <p>De 'Goal in One' baan.
                    Tip: Door de lucht heeft meer kans dan
                    over de grond.</p>
                <div class="prev" onclick="prev()">PREV</div>
                <div class="next" onclick="next()">NEXT</div>
            </div>

            <div class="card card_17" id="card17">
                <div class="image"></div>
                <h2>Ghole 17</h2>
                <p>Een links- en rechtsbenige baan.
                    Tip: Gewoon knallen tegen de bal.</p>
                <div class="prev" onclick="prev()">PREV</div>
                <div class="next" onclick="next()">NEXT</div>
            </div>

            <div class="card card_18" id="card18">
                <div class="image"></div>
                <h2>Ghole 18</h2>
                <p>Speel de bal in of over het vak met de oranje paaltjes. Pak dan de bal op en leg deze op de stip.
                    Tip: De bal dient in 1 keer de muur en de
                    keeper te passeren.</p>
                <div class="prev" onclick="prev()">PREV</div>
                <div class="next" onclick="next()">NEXT</div>
            </div>

        </div>
    </div>

    <script src="java.js"></script>
</div>
</body>
</html>
