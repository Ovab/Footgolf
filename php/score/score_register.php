<?php
include_once "../connect.php";
$score = $_POST['speler_score'];
$spelerPos = $_SESSION['Speler_pos'];
//$hole=$_GET['hole'];
$hole = 1;//test line, moet weg in echte code en line er boven moet gebruikt worden
$groepID = $_SESSION['groupID'];
if($score>=10){
    $_SESSION['errors'] = 'Je mag niet meer dan 10 keer slaan <br>';
    header('location:Score-front-end.php');
}
else {
    $alter_query = "update spellen set Speler$spelerPos= $score where groupID = $groepID and Hole = $hole";
    $res_student = mysqli_query($conn, "SELECT groupID, Hole FROM spellen WHERE groupID='$groepID' and Hole='$hole'");
    if ($row_student = mysqli_fetch_assoc($res_student)) {
        $res = mysqli_query($conn, $alter_query);
        if (!$res) {
            //something went wrong, display the error
            $_SESSION['errors'] = 'Er ging iets fout, probeer aub opnieuw <br>';
            header('location:Score-front-end.php');
        } else {
            //Header naar score front end
            header('location:Score-front-end.php');
        }
    } else {
        $spelerQ = "Speler" . $spelerPos;
        $student = mysqli_query($conn, "INSERT INTO spellen(Hole, $spelerQ, groupID) values ($hole ,$score, $groepID);");
        if (!$student) {
            $_SESSION['errors'] = 'Er ging iets fout, probeer aub opnieuw <br>';
            header('location:Score-front-end.php');
        } else {
            //Header naar score front end
            header('location:Score-front-end.php');
        }
    }
}