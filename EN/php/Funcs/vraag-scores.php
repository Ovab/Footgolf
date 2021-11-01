<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="vraagscores.css"/>
    <title>Footgolf - Vraag scores</title>
</head>

<body>
<div class="container">
    <div class="forms-container">
        <!--Sign in form -->
        <div class="signin-signup">
            <form action="#" class="sign-in-form" method="post">
                <h2 class="title">Insert the group code of the team you want scores of </h2>

                <?php
                include_once '../connect.php';
                if (isset($_SESSION)) {
                    error_reporting(E_ERROR | E_PARSE);
                    $errors = $_SESSION['Errors'];
                }
                if (isset($_SESSION['Errors'])) {
                    echo "<div class='error-text'>" . $errors . ". <br></div>";
                }
                unset($errors);
                unset($_SESSION['Errors']);
                if (isset($_POST['GameCode'])) {
                    $GID = $_POST['GameCode'];
                    //print_r($_POST);
                    $sql2 = "SELECT * FROM groep where groupID=$GID";
                    $result2 = $conn->query($sql2);
                    while ($row2 = $result2->fetch_assoc()) {
                        $speler_aantal = $row2['SPELER_AANTAL'];
                        $groepnaam = $row2['GroepNaam'];
                        $naam1 = $row2['Speler1'];
                        $naam2 = $row2['Speler2'];
                        $naam3 = $row2['Speler3'];
                        $naam4 = $row2['Speler4'];
                    }

                    $spellen = mysqli_query($conn, "select Hole, Speler1, Speler2, Speler3, Speler4 from spellen where groupID = $GID and Aanmaak_datum=curdate() order by Hole");

                    echo "
                            <table>
                             <th colspan='100%'>Group-name: $groepnaam </th><tr></tr>
                            <th>Hole:</th>
                            <th>&nbsp$naam1&nbsp</th>";
                    if (isset($naam2)) {
                        echo "<th>&nbsp$naam2&nbsp</th>";
                    }
                    if (isset($naam3)) {
                        echo "<th>&nbsp$naam3&nbsp</th>";
                    }
                    if (isset($naam4)) {
                        echo "<th>&nbsp$naam4&nbsp</th>";
                    }
                    echo "<tr>";
                    while ($row = mysqli_fetch_assoc($spellen)) {
                        $speler1 = $row['Speler1'];
                        $speler2 = $row['Speler2'];
                        $speler3 = $row['Speler3'];
                        $speler4 = $row['Speler4'];
                        echo '
							<td>' . $row['Hole'] . '</td>
							<td>' . $speler1 . '</td>
							';
                        if (isset($speler2)) {
                            echo "<td> $speler2 </td>";
                        }
                        if (isset($speler3)) {
                            echo "<td> $speler3 </td>";
                        }
                        if (isset($speler4)) {
                            echo "<td> $speler4 </td>";
                        }
                        echo "</tr>";
                    }
                    $_SESSION ['tablepost'] = true;
                }
                ?>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="text" inputmode="numeric" pattern="[0-9]*" placeholder="Game Code" name="GameCode"/>
                </div>
                <input type="submit" class="btn" value="Vraag scores"/>
            </form>
        </div>
    </div>
</div>
<p id="pc"></p>

<div class="panel right-panel">
    <div class="content">
        <h3>Een van ons?</h3>
        <p>
            Log in, om weer de leukste ervaring te beleven!
        </p>
        <button class="btn transparent" id="sign-in-btn">Join</button>


    </div>
</div>
</body>
<script src='../../Javascript/jquery.min.js'></script>
</html>
