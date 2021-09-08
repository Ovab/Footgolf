<?php
include "connect.php";
$score1=$_POST['speler_score'];
$sql="insert into spellen(SpelID,Hole, Afstand, Norm, Score)  values ('".$score1."','".$score1."','".$score1."','".$score1."', '".$score1."')";
    $res=mysqli_query($conn,$sql);
    if (!$res) {
    //something went wrong, display the error
    echo 'Something went wrong while registering. Please try again later.';
    echo mysqli_error($conn);//debug shiit
} else {
    //Header naar index

}

?>
<script src="jquery-1.9.0.min.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Footgolf - Score</title>
</head>
<body>
<form action="#" method="post">
    <label>Voer uw score in:</label>
    <input type="text" name="speler_score" id="spelerScore">
    <input type="submit">
</form>
</body>
</html>