<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../stylegroep.css"/>
    <title>Footgolf - Create group</title>
</head>

<body>
<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form action="team-naam.php" class="maak-groep" method="post">
                <h2 class="title">Your game code, others can join via this code.</h2>
                <?php
                include '../connect.php';
                if (isset($_SESSION['user_name'])) {
                    $naam1 = $_SESSION['user_name'];
                    //Genereer 5 digit random nummer
                    $random = mt_rand(1000, 99999);
                    $holes = $_GET['holes'];
                    $naam1s = $naam1 . "s team";
                    mysqli_query($conn, "DELETE  FROM groep WHERE Aanmaak_datum<=DATE_SUB(NOW(), INTERVAL 1 DAY)");
                    $insert = mysqli_query($conn, "insert into groep(GroepNaam, groupID, Aanmaak_datum, `Speler_aantal`, Speler1, num_holes) VALUES ('$naam1s',$random, NOW(), 1, '$naam1', $holes)");
                    if (!$insert) {
                        echo mysqli_error($conn) . "<br>";
                        echo 'Oops something went wrong, try again later';
                    } else {
                        $_SESSION['holes'] = $holes;
                        //maak een session variable van het random nummer
                        $_SESSION['groupID'] = $random;
                        //Maak ID-maker de leider van de groep
                        $_SESSION['groepLead'] = true;
                        //
                        $_SESSION['Speler_pos'] = 1;
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
                    if (!isset($random) && !isset($holes)) {
                        echo '<input type="text" placeholder="Are you sure you are logged in? " readonly /> <br>';
                    }
                    ?>
                </div>
                <?php
                if (isset($random) && isset($holes)) {
                    echo "<input type='submit' value='Next' class='btn' />";
                } else {
                    echo "<a style='text-align: center; text-decoration: none; href='../Login/login-front-end.php' class='btn'>Log in</a>";
                }
                ?>
                <div class="panel right-panel">
                    <div class="content">
                        <h3>One of us?</h3>
                        <p>
                            Log in, to get the most out of your experience!
                        </p>

</body>
<script src='../../Javascript/jquery.min.js'></script>
</html>
