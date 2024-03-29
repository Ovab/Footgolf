<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/maakgroep.css" />
    <title>Footgolf - maak group</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="team-naam.php" class="maak-groep" method="post">
                    <h2 class="title">Uw spel code, andere kunnen via deze code joinen.</h2>
                    <?php
                    include '../../connect.php';
                    if (isset($_SESSION['user_name'])) {
                        $naam1 = $_SESSION['user_name'];
                        //Genereer 5 digit random nummer
                        $i = 0;
                        while ($i != 5) {
                            $random = mt_rand(1000, 99999);
                            $holes = $_POST['holes'];
                            $naam1s = $naam1 . "s team";
                            $q = "INSERT INTO groep(GroepNaam, groupID, Aanmaak_datum, `Speler_aantal`, Speler1, num_holes) VALUES ('$naam1s',$random, NOW(), 1, '$naam1', $holes)";
                            // mysqli_query($conn, "DELETE  FROM groep WHERE Aanmaak_datum <= DATE_SUB(NOW(), INTERVAL 0 DAY)");
                            $insert = mysqli_query($conn, $q);
                            if (!$insert) {
                                echo 'Oeps er ging iets fout, we proberen het opnieuw';
                            } else {
                                $_SESSION['holes'] = $holes;
                                //maak een session variable van het random nummer
                                $_SESSION['groupID'] = $random;
                                //Maak ID-maker de leider van de groep
                                // $_SESSION['groepLead'] = true;
                                $_SESSION['groepLead'] = [$_SESSION["groupID"], $_SESSION["user_name"]];
                                //
                                $_SESSION['Speler_pos'] = 1;
                                break;
                            }
                            $i++;
                        }
                    }
                    ?>
                    <h3>Game Code:</h3>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <?php
                        if (isset($random) && isset($holes)) {
                            echo '<input type="text" placeholder="' . $random . '" readonly /> <br>';
                        }
                        //print_r($_POST);
                        //print $random;
                        if (!isset($random) && !isset($holes)) {
                            echo '<input type="text" placeholder="Weet je zeker dat je bent ingelogd? " readonly /> <br>';
                        }
                        ?>
                    </div>
                    <?php
                    if (isset($random) && isset($holes)) {
                        echo "<input type='submit' value='Volgende' class='btn' />";
                    } else {
                        echo "<a style='text-align: center; text-decoration: none;' href='../Login/login-front-end.php' class='btn'>Ga naar login</a>";
                    }
                    ?>
                    <div class="panel right-panel">
                        <div class="content">
                            <h3>Een van ons?</h3>
                            <p>
                                Log in, om weer de leukste ervaring te beleven!
                            </p>

</body>
<script src='../../Javascript/jquery.min.js'></script>

</html>