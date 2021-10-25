<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="team-naam.css"/>
    <title>Footgolf - Voer team-naam in</title>
</head>

<body>
<?php
include_once '../connect.php';
error_reporting(E_ERROR | E_PARSE);
$groupID = $_SESSION['groupID'];
$select_naam = mysqli_query($conn, "Select GroepNaam from groep where groupID=$groupID");
?>
<div class="container">
    <div class="wrapper">
        <h2 class="title">Voer team naam in:</h2>
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

        if (!$select_naam) {
            echo 'Oeps er ging iets fout, probeer aub opnieuw';
        } else {
            while ($row = mysqli_fetch_assoc($select_naam)) {
                $GroepNaam = $row['GroepNaam'];
            }
            echo "<br><div style='text-align: center'> <h2> Team Naam: " . $GroepNaam . "</h2></div>";
        }
        ?>
        <div class="input-field">
            <form action="Team-naam-back.php" method="post">
                <input class="input-text" type="text" placeholder='Team-naam' name="TeamNaam"/>
                <div class="fast-wrapper">
                    <input class="btn" type="submit" value="Submit"/>
                </div>
            </form>
            <div style="text-decoration: none; margin-top: 70%;">
                <a href="../../index.php" style="color: white;">
                    <input class="btn" style="text-align: center; margin-right: 100%" value="Naar home">
                </a>
            </div>
        </div>
    </div>
</div>
</body>
<!--<script src='../../Javascript/jquery.min.js'></script>-->
</html>
