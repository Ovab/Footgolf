<?php
include_once "../connect.php";
$score = $_POST['speler_score'];
$spelerPos = $_SESSION['Speler_pos'];
$hole = $_GET['hole'];
$groepID = $_SESSION['groupID'];
if ($score >= 10) {
    $_SESSION['errors'] = 'Je mag niet meer dan 10 keer slaan <br>';
    header('location:Score-front-end.php?hole=' . $hole);
}
if ($score < 0) {
    $_SESSION['errors'] = 'Bruh. <br>';
    header('location:Score-front-end.php?hole=' . $hole);
} else {
    $alter_query = "update spellen set Speler$spelerPos= $score where groupID = $groepID and Hole = $hole";
    $res_student = mysqli_query($conn, "SELECT groupID, Hole FROM spellen WHERE groupID='$groepID' and Hole='$hole'");
    if ($row_student = mysqli_fetch_assoc($res_student)) {
        $res = mysqli_query($conn, $alter_query);
        if (!$res) {
            //something went wrong, display the error
            $_SESSION['errors'] = 'Er ging iets fout, probeer aub opnieuw <br>';
            header('location:Score-front-end.php?hole=' . $hole);
        } else {
            //Header naar score front end
            header('location:Score-front-end.php?hole=' . $hole);
        }
    } else {
        $spelerQ = "Speler" . $spelerPos;
        $naam = mysqli_query($conn, "select groepnaam from groep where groupID=$groepID");
        while ($row2 = $naam->fetch_assoc()) {
            $Groep_naam = $row2['groepnaam'];
        }
        $q = "INSERT INTO spellen(Hole, $spelerQ, groupID, Aanmaak_datum, GroepNaam) values ($hole ,$score, $groepID, curdate(), '$Groep_naam');";
        echo $q;
        $student = mysqli_query($conn, $q);
        if ($student) {
            header('location:Score-front-end.php?hole=' . $hole);
        } else {
            //Header naar score front end
            $_SESSION['errors'] = 'Er ging iets fout, probeer aub opnieuw <br>';
            header('location:Score-front-end.php?hole=' . $hole);
        }
    }
}