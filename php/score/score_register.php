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
    $selectyBoi = "select Speler1, Speler2, Speler3, Speler4, GroepScore from spellen where groupID = $groepID";
    $alter_query2 = "update spellen set GroepScore=+Speler1+ifnull(Speler2,0)+ifnull(Speler3,0)+ifnull(Speler4,0) where groupID =$groepID";
    $res_student = mysqli_query($conn, "SELECT groupID, Hole FROM spellen WHERE groupID='$groepID' and Hole='$hole'");
    if ($row_student = mysqli_fetch_assoc($res_student)) {
        $res = mysqli_query($conn, $alter_query);
        $res2 = mysqli_query($conn, $alter_query2);
        $res3 = mysqli_query($conn, $selectyBoi);
        if (!$res && !$res2 && !$res3) {
            //something went wrong, display the error
            $_SESSION['errors'] = 'Er ging iets fout, probeer aub opnieuw <br>';
            header('location:Score-front-end.php?hole=' . $hole);
        } else {
            $totP1=0;
            $totP2=0;
            $totP3=0;
            $totP4=0;
            while ($row = mysqli_fetch_assoc($res3)) {
                $totP1= $row['Speler1']+$totP1;
                $totP2= $row['Speler2']+$totP2;
                $totP3= $row['Speler3']+$totP3;
                $totP4= $row['Speler4']+$totP4;
            }
            echo $totP1. "<br>";
            echo $totP2. "<br>";
            echo $totP3. "<br>";
            echo $totP4. "<br>";
            $totTot=$totP1+$totP2+$totP3+$totP4;
            echo "<br>".$totTot. "<br>";
            $teamnaam=$_SESSION['teamnaam'];
            $alter_query = "update spellen set GroepScore=$totTot where groupID=$groepID and GroepNaam=$teamnaam";
            mysqli_query($conn, $alter_query);
            print_r($_SESSION);

            //Header naar score front end
            //header('location:Score-front-end.php?hole=' . $hole);
        }
    } else {
        $spelerQ = "Speler" . $spelerPos;
        $naam = mysqli_query($conn, "select groepnaam from groep where groupID=$groepID");
        while ($row2 = $naam->fetch_assoc()) {
            $Groep_naam = $row2['groepnaam'];
        }
        $q = "INSERT INTO spellen(Hole, $spelerQ, groupID, Aanmaak_datum, GroepNaam, GroepScore) values ($hole ,$score, $groepID, curdate(), '$Groep_naam', GroepScore+$score);";
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