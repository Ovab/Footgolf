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
    <?php
    session_start();
    if (isset($_SESSION['user_name'])){
        echo "<div class='gebruikersnaam'> welcome " . $_SESSION['user_name'] . "<a href='../EN/php/Login/signout.php'> Log uit</a> <div>";
    }
    ?>
    <h2 class="title">Categories</h2>
    <div class="btns-wrapper">
        <div class="btn" onclick="showRegels()"><img class="icon" src="icons/golfer.png"><br>
            <p>Spelregels</p></div>
        <div class="btn" onclick="showLeaderboard()"><img class="icon" src="icons/crown-solid.svg"><br>
            <p>Top scores</p></div>
        <?php
        if (isset($_SESSION['groupID'])) {
            echo "<div class='btn' onclick='showGholes()'><img class='icon' src='../EN/icons/holes.png'><br>
            <p>Gholes</p></div>
            ";
        }
        if (isset($_SESSION['signed_in'])) {
            echo "<div class='btn' onclick='showReservation()' ><img class='icon' src = '../EN/icons/reservation.png' ><br >
            <p > Groups</p ></div>";
        }
        if (!isset($_SESSION['signed_in'])) {
            echo "<a style='text-decoration: none' href='../EN/php/Login/login-front-end.php'>
        <!--Icon van fontaswome  -->
        <div class='btn'><img class='icon' src='../EN/icons/users.svg'><br>
            <p>Login</p></div></a>";
        }
        ?>
    </div>

    <h2 class="title" id="title">Game rules</h2>

    <div class="container" id="spelregels">
        <div class="box"><img class="icon" src="img/Footgolf-Badge-1.png"><br>
            <p>The goal of the game is to kick the ball past various obstacles into the holes in as little tries as
                possible.<br>
                The ball furthest away from the ghole is played first with a maximum of 10 per hole
            </p>
        </div>

        <div class="box2"><img class="icon" src="img/Footgolf-Badge-1.png"><br>
            <p>Have fun!</p>
        </div>

        <div class="box3"><img class="icon" src="img/Footgolf-Badge-1.png"><br>
            <p>
                If an obstacle is missed put the ball 3m before the obstacle <br>If the ball lands in the un mowed grass
                put the ball where it left the hole
            </p>
        </div>
    </div>

    <div class="container" id="reservation">
        <a href="php/Groep/join_group.php" style="text-decoration: none">
            <div class="box"><img class="icon" src="img/Footgolf-Badge-1.png"><br>
                <p>Join group</p>
            </div>
        </a>

        <a href="php/Groep/Holes_aantal.html" style="text-decoration: none">
            <div class="box2"><img class="icon" src="img/Footgolf-Badge-1.png"><br>
                <p>Create group</p>
            </div>
            <?php
            if (isset($_SESSION['groepLead'])) {
                echo "
            <a href='../NL/php/Funcs/Group_manager.php' style='text-decoration: none'>
                <div class='box'><img class='icon' src='../EN/img/Footgolf-Badge-1.png'><br>
                    <p>Group manager</p>
                </div>";
            }
            ?>
        </a>
        </a>
    </div>


    <div class="container" id="leaderboard">
        <a href="php/Funcs/leaderboard.php?holes=18" style="text-decoration: none">
            <div class="box"><img class="icon" src="img/Footgolf-Badge-1.png"><br>
                <p>Top scores 18 gholes</p>
            </div>
        </a>

        <a href="php/Funcs/leaderboard.php?holes=27" style="text-decoration: none">
            <div class="box2"><img class="icon" src="img/Footgolf-Badge-1.png"><br>
                <p>Top scores 27 gholes</p>
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