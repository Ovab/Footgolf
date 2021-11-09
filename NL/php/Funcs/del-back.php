<?php
include_once "../connect.php";

function error($msg, $locatie = "../Login/login-front-end.php")
{
    $_SESSION['errors'] = $msg;
    header("location:" . $locatie);
}
if ($_SESSION['signed_in']) {
    if($_POST['confirm']) {
        $email = $_POST['email'];
        if ($stmt2 = $conn->prepare("DELETE FROM spelers WHERE `Speler-email`= ?")) {
            $stmt2->bind_param('s', $email);
            if ($stmt2->execute()) {
                session_destroy();
                session_start();
                $_SESSION['errors'] = "Account successvol verwijderd";
                header("location: ../Login/login-front-end.php");
            } else {
                error("We konden het account niet uit de database halen, probeer aub opnieuw", "Del_account.php");
            }
        } else {
            error("Er ging iets fout met het account verwijderen uit de database probeer aub opnieuw", "Del_account.php");
        }
    } else{
        error("Je moet eerst bevestigen dat je je account echt wilt verwijderen", "Del_account.php");
    }
} else {
    session_destroy();
    session_start();
    echo"not logged in";
    //error("Zorg dat je eerst bent ingelogd om je account te verwijderen");
}