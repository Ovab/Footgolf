<?php
include_once "connect.php";
$sql = "SELECT SpelID, Hole, Afstand, Norm, Score FROM spellen";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "SpelID: " . $row["SpelID"]. "<br>";
    }
} else {
    echo "0 results";
}
?>
<!DOCTYPE html>
<html lang="en">
<script src="../Javascript/jquery.min.js"></script>
<script language="javascript" src="../Javascript/jquery.timer-1.0.0.js"></script>
<head>
    <meta charset="UTF-8">
    <title>Footgolf - Score</title>
</head>
<body>
<form action="score_register.php" method="post">
    <label>Voer uw score in:</label>
    <input type="text" name="speler_score" id="spelerScore">
    <input type="submit">
</form>

<script>$(document).ready(function() {
        $('#c1b').load('../score_register.php');
        refresh();
    });
    function refresh(){
        setTimeout( function() {
            $('#c1b').fadeOut('slow').load('../php/score_register.php').fadeIn('slow');
            refresh();
        }, 5000);
    }
</script>
</body>
</html>