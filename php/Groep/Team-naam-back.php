<?php
include_once '../connect.php';
$userinput=$_POST['TeamNaam'];
if (isset($_SESSION['groupID'])) {
    $groupID=$_SESSION['groupID'];
    $insert = mysqli_real_escape_string($conn, "UPDATE `groep` SET `GroepNaam` = $userinput WHERE `groep`.`groupID` = $groupID");
    if (!$insert) {
        echo mysqli_error($conn) . "<br>";
        echo 'Oeps er ging iets fout, probeer aub opnieuw';
        header('Location:team-naam.php');
    } else {
        $_SESSION['teamnaam']=$userinput;
        header('location:../../index.html');
    }
}
else{
    header('location:team-naam.php');
}