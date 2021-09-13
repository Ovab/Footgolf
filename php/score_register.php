<?php
include_once "connect.php";
$score1=$_POST['speler_score'];
$qury='SpelID,Hole, Afstand, Norm, Score,';
$spelerPos='Speler'.$_SESSION['Speler_pos'];
$q2=', groupID';
$groepID=$_SESSION['groepID'];
$where=' where groupID='.$_SESSION['groepID'];
$where_met_values=` values ($score1 ,$score1 ,$score1 , $score1 ,$score1 ,$score1, $groepID)$where`;
$query="insert into spellen(SpelID,Hole, Afstand, Norm, Score, groupID)  values ($score1 ,$score1 ,$score1 , $score1 ,$score1, $groepID) where groupID = $groepID";

$sql="$query";
    $res=mysqli_query($conn,$sql);
    if (!$res) {
    //something went wrong, display the error
    echo 'Something went wrong while registering. Please try again later.';
    echo mysqli_error($conn);//debug shiit
} else {
    //Header naar score front end
        header('location:Score-front-end.php');

}