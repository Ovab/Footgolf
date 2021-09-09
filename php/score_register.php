<?php
include_once "connect.php";
$score1=$_POST['speler_score'];
$sql="insert into spellen(SpelID,Hole, Afstand, Norm, Score)  values ('".$score1."','".$score1."','".$score1."','".$score1."', '".$score1."')";
    $res=mysqli_query($conn,$sql);
    if (!$res) {
    //something went wrong, display the error
    echo 'Something went wrong while registering. Please try again later.';
    echo mysqli_error($conn);//debug shiit
} else {
    //Header naar score front end
        header('location:Score-front-end.php');

}