<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Footgolf - Home</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>


<div class="wrapper">

    <h2 class="title">Categories</h2>
    <div class="btns-wrapper">
        <div class="btn" onclick="toggleSpelregels()"><img class="icon" src="icons/golfer.png"><br>
            <p>Spelregels</p></div>
        <div class="btn" onclick="toggleLeaderboard()"><img class="icon" src="icons/crown-solid.svg"><br>
            <p>Top scores</p></div>
        <?php
        session_start();
        if (isset($_SESSION['groupID'])) {
            echo "<div class='btn' onclick='toggleGholes()'><img class='icon' src='icons/holes.png'><br>
            <p>Gholes</p></div>
            ";
        }
        if (isset($_SESSION['signed_in'])) {
            echo "<div class='btn' onclick='toggleReservation()' ><img class='icon' src = 'icons/reservation.png' ><br >
            <p > Groepen</p ></div>";
        }
        if (!isset($_SESSION['signed_in'])) {
            echo "<a style='text-decoration: none'>
        <!--Icon van fontaswome  -->
        <div class='btn'><img class='icon' src='icons/users.svg'><br>
            <p>Login</p></div>";
        }
        ?>
    </div>

    <h2 class="title" id="title">Spelregels</h2>

    <div class="container" id="spelregels">
        <div class="box"><img class="icon" src="img/Footgolf-Badge-1.png"><br>
            <p>De bedoeling van het spel is dat je de bal in zo min mogelijk trappen, Langs diverse hindernissen de
                Ghole in speelt
                Tijdens het spel geldt dat de bal die het verst van de Ghole af ligt, als eerste mag worden gespeeld.
                Het maximaal aantal par per baan is 10.
            </p>
        </div>

        <div class="box2"><img class="icon" src="img/Footgolf-Badge-1.png"><br>
            <p>Veel Plezier!</p>
        </div>

        <div class="box3"><img class="icon" src="img/Footgolf-Badge-1.png"><br>
            <p>
                Als de hindernis gemist wordt:
                Leg dan de bal 3 meter voor de hindernis
                Als de bal via het ongemaaide gras weer in de baan komt:
                Leg dan de bal terug waar deze de baan verliet
            </p>
        </div>
    </div>

    <div class="container" id="reservation">
        <a href="php/Groep/join_group.php" style="text-decoration: none">
            <div class="box"><img class="icon" src="img/Footgolf-Badge-1.png"><br>
                <p>Join groep</p>
            </div>
        </a>

        <a href="php/Groep/Holes_aantal.php" style="text-decoration: none">
            <div class="box2"><img class="icon" src="img/Footgolf-Badge-1.png"><br>
                <p>Maak groep</p>
            </div>
            <?php
            if (isset($_SESSION['groepLead'])) {
                echo "
            <a href='php/Funcs/Group_manager.php' style='text-decoration: none'>
                <div class='box'><img class='icon' src='img/Footgolf-Badge-1.png'><br>
                    <p>Groep Beheer</p>
                </div>";
            }
            ?>
        </a>
        </a>
    </div>


    <div class="container" id="leaderboard">
        <a href="php/Funcs/leaderboard.php?holes=18" style="text-decoration: none">
            <div class="box"><img class="icon" src="img/Footgolf-Badge-1.png"><br>
                <p>Top scores 18 holes</p>
            </div>
        </a>

        <a href="php/Funcs/leaderboard.php?holes=27" style="text-decoration: none">
            <div class="box2"><img class="icon" src="img/Footgolf-Badge-1.png"><br>
                <p>Top scores 27 holes</p>
            </div>
        </a>
    </div>

    <div class="container" id="gholes">
        <div class="scrolling-wrapper">
            <?php
            if (isset($_SESSION['holes'])) {
                unset($_SESSION["cur_hole"]);
                $holes = $_SESSION['holes'];
                $i = 0;
                while ($i < $holes) {
                    $i++;
                    echo "<div class='card'><a style='text-decoration: none; color: white; font-size: xxx-large;  position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);' href='php/score/Score-front-end.php?hole=$i'>Hole $i</a> </div>";
                    if ($i == ceil(($holes / 2))) {
                        echo "<br>";
                    }
                }
            }
            ?>
        </div>
    </div>
</div>
<script src="Javascript/index.js"></script>

</body>
</html>