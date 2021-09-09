<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Footgolf - Score</title>
</head>
<body>
<p id="score"></p>
<form action="score_register.php" method="post">
    <label>Voer uw score in:</label>
    <input type="text" name="speler_score" id="spelerScore">
    <input type="submit">
</form>
<p id="score1"></p>
<script src="../Javascript/jquery.min.js"></script>
<script>
    let ready=true
    //setInterval(function(){ ready=false }, 3000);
    setTimeout( function () {
        jQuery.ajax({
            url: 'score_fetch.php', //Define your script url here ...
            data: '', //Pass some data if you need to
            method: 'POST', //Makes sense only if you passing data
            success: function(answer) {
                jQuery('#score1').html(answer);//update your div with new content, yey ....
            },
            error: function() {
                //unknown error occorupted
                alert("shit brokey");
            }
        });
    }, 2000 );
</script>
</body>
</html>