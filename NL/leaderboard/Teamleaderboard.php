<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="leaderbord.css" />
    <title>Footgolf - Top scores</title>
</head>

<body>
    <div class="signin-signup">
        <form action="#" class="sign-in-form" method="post">
            <?php
            $req = require_once '../connect.php';
            if (!$req) {
                echo "We konden geen verbinding maken met de database, probeer aub opnieuw";
            }
            if (isset($_SESSION['groupID'])) {
                if (isset($_SESSION['Errors'])) {
                    echo "<div class='error-text'>" . $errors . ". <br></div>";
                }
                unset($errors);
                unset($_SESSION['Errors']);
                //print_r($_POST);
                $GID = $_SESSION['groupID'];
                $teamnaam = $_SESSION['teamnaam'];
                $spellen = mysqli_query($conn, "SELECT GroepNaam,	Speler1, Speler2, Speler3,Speler4 from `spellen` where groupID=$GID");
                $groep = mysqli_query($conn, "SELECT Speler_aantal, Speler1, Speler2, Speler3, Speler4  from `groep` where groupID=$GID");
                while ($row2 = mysqli_fetch_assoc($groep)) {
                    $groep_groote = $row2['Speler_aantal'];
                    $naam1 = $row2['Speler1'];
                    $naam2 = $row2['Speler2'];
                    $naam3 = $row2['Speler3'];
                    $naam4 = $row2['Speler4'];
                }

                echo mysqli_error($conn);
                echo "
                            <table border='1'>
                            <tr><th colspan='4'>Team-naam: $teamnaam</th></tr>
                            ";
                echo "<th>Score " . $naam1 . "</th>";
                if ($groep_groote >= 2) {
                    echo "<th>Score " . $naam2 . "</th>";
                }
                if ($groep_groote >= 3) {
                    echo "<th>Score " . $naam3 . "</th>";
                }
                if ($groep_groote >= 4) {
                    echo "<th>Score " . $naam4 . "</th>";
                }
                echo "<tr>";
                $j = 1;
                while ($row = mysqli_fetch_assoc($spellen)) {
                    $scores = $row['Speler1'] + $row['Speler2'] + $row['Speler3'] + $row['Speler4'];
                    $j++;
                    if (isset($row['GroepNaam'])) {
                        echo '
							<td>' . $scores . '</td>
							';
                    }
                }
                echo "<a href='../index.php' class='btn' style='text-decoration: none; text-align: center; font-size: large'>Naar home</a>";
            } else {
                echo "<h1>Dat hoorde je niet te doen, je hoort uberhaupt terug gestuurd te worden naar de home pagina</h1>";
                //header("location:../index.php");
            }
            ?>
    </div>
</body>
<script src='../../Javascript/jquery.min.js'></script>

</html>