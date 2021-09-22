<?php
include_once "../connect.php";
$score1=$_POST['speler_score'];
$spelerPos=$_SESSION['Speler_pos'];
//$hole=$_GET['hole'];
$hole=1;//test line, moet weg in echte code en line er boven moet gebruikt worden
$groepID=$_SESSION['groupID'];
$alter_query="update spellen set Speler$spelerPos= $score1 where groupID = $groepID and Hole = $hole" ;
/*
 * //code die het altjd in de DB zet, blijft er in just in case.
    $res=mysqli_query($conn,$alter_query);
    if (!$res) {
    //something went wrong, display the error
    echo 'Er ging iets fout, probeer aub opnieuw <br>';
    echo mysqli_error($conn);//debug shiit
} else {
    //Header naar score front end
        header('location:Score-front-end.php');
}
*/
$_SESSION['yeet']=$alter_query;
$res_student = mysqli_query($conn,"SELECT groupID, Hole FROM spellen WHERE groupID='$groepID' and Hole='$hole' LIMIT 1 ");
if($row_student = mysqli_fetch_assoc($res_student)) {
    $res=mysqli_query($conn,$alter_query);
    if (!$res) {
        //something went wrong, display the error
        echo 'Er ging iets fout, probeer aub opnieuw <br>';
        echo mysqli_error($conn);//debug shiit
    } else {
        //Header naar score front end
        header('location:Score-front-end.php');
    }
}
else {
    $spelerQ="Speler".$spelerPos;
    $student = mysqli_query($conn,"INSERT INTO spellen(Hole, $spelerQ, groupID) values ($hole ,$score1, $groepID);");
    if(!$student){
        echo 'Er ging iets fout, probeer aub opnieuw <br>';
        print_r($_SESSION);
        //Testing
        echo mysqli_error($conn);
    }else {
        //Header naar score front end
        header('location:Score-front-end.php');
    }
}