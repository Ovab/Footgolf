<?php
include_once "../connect.php";
function error($msg){
    session_destroy();
    session_start();
    $_SESSION['errors'] = $msg;
    header("location:login-front-end.php");
}

$verify = $_GET['c'];
$email=$_SESSION['email'];
echo $verify . "<br>";
echo $email . "<br>";
$telnummer = (int)$_SESSION['telefoon'];
if ($stmt = $conn->prepare("select verifyCode, SpelerEmail from `emailverify` where verifyCode=? and SpelerEmail=?")) {
    $stmt->bind_param("ss", $verify, $email);
    echo "bound <br>";
    if ($stmt->execute()) {
        $stmt->store_result();
        $row_cnt = $stmt->num_rows;
        if ($row_cnt == 1) {
            $stmt->free_result();
            if ($stmt2 = $conn->prepare("DELETE FROM spelers WHERE `Speler-email`= ?")) {
                $stmt2->bind_param('s', $email);
                if ($stmt2->execute()) {
                    $stmt3 = $conn->prepare("DELETE FROM emailverify WHERE SpelerEmail=?");
                    $stmt3->bind_param('s', $email);
                    $stmt3->execute();
                    session_destroy();
                    session_start();
                    $_SESSION['errors'] = "Account successvol verwijderd";
                    header("location: ../Login/login-front-end.php");
                } else {
                    error("Er ging iets fout met het account in de database zetten, probeer aub opnieuw");
                }
            } else {
                error("Er ging iets fout met het params binden, probeer aub opnieuw");
            }
        } else {
            error("Is de code die u heeft ingevoerd correct?");
        }
    } else {
        error("Er is iets fout gegaan met de code checken, probeer aub opnieuw");
    }

} else {
    session_destroy();
    session_start();
    $_SESSION['errors'] = "Is de code die u heeft ingevoerd correct?";
    header("location:login-front-end.php");
}