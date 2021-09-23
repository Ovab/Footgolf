
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../stylegroep.css" />
    <title>Footgolf - maak group</title>
</head>

<body>
<div class="container">
    <div class="forms-container">
        <!--Sign in form -->
        <div class="signin-signup">
            <form action="maak_groep.php" class="maak-groep" method="post">
                <h2 class="title">Genereer uw game code</h2>
<?php
include '../connect.php';
//Kan je weg halen als je het form heb geremaked, is mainly voor testing
    $naam1=$_SESSION['user_name'];
    //Genereer 5 digit random nummer
    $random= mt_rand(1000,99999);
    mysqli_query($conn,"DELETE  FROM groep WHERE Aanmaak_datum<=DATE_SUB(NOW(), INTERVAL 1 DAY)");
    $insert=mysqli_query($conn,"insert into groep(groupID, Aanmaak_datum, `Speler_aantal`, Speler1) VALUES ($random, NOW(), 1, '$naam1')");
    if(!$insert){
        echo mysqli_error($conn)."<br>";
        echo 'Oeps er ging iets fout, probeer aub opnieuw';
    }
    else {
        //maak een session variable van het random nummer
        $_SESSION['groupID'] = $random;
        //Maak ID-maker de leider van de groep
        $_SESSION['groepLead'] = true;
        //
        $_SESSION['Speler_pos'] = 1;
        //Print het session variable, success met dit goed in de HTML zetten Lotfi ;)
        echo '<h3>Game Code:</h3>';
}
?>

<div class="input-field">
    <i class="fas fa-lock"></i>
    <?php
        if (isset($random)) {
            echo '<input type="text" placeholder="' . $random . '" readonly <input/>';
        }
    ?>
</div>
<input type="submit" class="btn" value="Genereer" />
<div class="panel right-panel">
    <div class="content">
        <h3>Een van ons?</h3>
        <p>
            Log in, om weer de leukste ervaring te beleven!
        </p>
        <button class="btn transparent" id="sign-in-btn">
            Log in
        </button>

        <script src="../../Javascript/app.js"></script>


        </body>
        <script src='../../Javascript/jquery.min.js'></script>
        </html>
