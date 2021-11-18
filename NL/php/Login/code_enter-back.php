<?php
include_once "../../connect.php";
$speler = $_SESSION['user_name'];
$verify = $_GET['c'];
$email = $_SESSION['email'];
$telnummer = (int)$_SESSION['telefoon'];
if ($stmt = $conn->prepare("select verifyCode, SpelerEmail from `emailverify` where verifyCode=? and SpelerEmail=?")) {
    $stmt->bind_param("ss", $verify, $email);
    if ($stmt->execute()) {
        $stmt->store_result();
        $row_cnt = $stmt->num_rows;
        if ($row_cnt == 1) {
            $stmt->free_result();
            if ($stmt2 = $conn->prepare("INSERT INTO spelers(`Speler-email`, `Speler-naam`, `Speler-telefoon`) VALUES(?,?,$telnummer)")) {
                $stmt2->bind_param('ss', $email, $speler);
                if ($stmt2->execute()) {
                    $_SESSION['signed_in'] = true;
                    $_SESSION['user_name'] = $speler;
                    $stmt3 = $conn->prepare("DELETE FROM emailverify WHERE SpelerEmail=?");
                    $stmt3->bind_param('s', $email);
                    $stmt3->execute();
                    header("location: ../../index.php");
                } else {
                    session_destroy();
                    session_start();
                    $_SESSION['errors'] = "Er ging iets fout met het account in de database zetten, probeer aub opnieuw";
                    header("location:login-front-end.php");
                }
            } else {
                session_destroy();
                session_start();
                $_SESSION['errors'] = "Er ging iets fout met het account in de database zetten, probeer aub opnieuw";
                header("location:login-front-end.php");
            }
        } else {
            session_destroy();
            session_start();
            $_SESSION['errors'] = "Is de code die u heeft ingevoerd correct?";
            header("location:login-front-end.php");
        }
    } else {
        session_destroy();
        session_start();
        $_SESSION['errors'] = "Er is iets fout gegaan met de code checken, probeer aub opnieuw";
        header("location:login-front-end.php");
    }

} else {
    session_destroy();
    session_start();
    $_SESSION['errors'] = "Is de code die u heeft ingevoerd correct?";
    header("location:login-front-end.php");
}