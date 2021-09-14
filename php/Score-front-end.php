<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Footgolf - Score</title>
</head>
<body>
<?php include('connect.php');print_r($_SESSION);
?>
<p id="score"></p>
<form action="score_register.php" method="post">
    <label>Voer uw score in:</label>
    <input type="text" name="speler_score" id="spelerScore">
    <input type="submit">
</form>
<p id="score1"></p>
<!--Import jQuery -->
<script src="../Javascript/jquery.min.js"></script>
<!--auto refresh script -->
<script>
    //maak functie aan.
        function update_var() {
            jQuery.ajax({
                url: 'score_fetch.php', //Define your script url here ...
                method: 'POST', //Makes sense only if you passing data
                success: function (answer) {
                    jQuery('#score1').html(answer);//update your div with new content, yey ....
                },
                error: function () {
                    //unknown error occorupted
                    alert("shit brokey");
                }
            });
        }
        update_var()
        //Call de functie elke ~2.7 sec
    setInterval(function(){ update_var() }, 2700);
</script>
</body>
</html>