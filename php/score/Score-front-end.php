<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Footgolf - Score</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
                 //resume / start sessie
                 session_start();
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
    print_r($_SESSION);
    $errors = ' ';
    unset($_SESSION['errors']);
}
?>
<form action="score_register.php" method="post">
    <label>Voer uw score in:</label>
    <input type="text" name="speler_score" id="spelerScore">
    <input type="submit">
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
                method: 'POST', //Methode data doorgeven
                success: function (answer) {
                    jQuery('#score').html(answer);//update your div with new content ....
                },
                error: function () {
                    //Iets ging fout, niet sure wat tho
                    alert("Onbekende error met refreshen, refresh weer over 2.7 sec");
                }
            });
        }
        update_var()
        //Call de functie elke ~2.7 sec
    setInterval(function(){ update_var() }, 2700);
</script>
</body>
</html>