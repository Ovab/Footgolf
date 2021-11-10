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
                error("Something went wrong deleting the account, please try again", "Del_account.php");
            }
        } else {
            error("Something went wrong deleting the account, please try again", "Del_account.php");
        }
    } else{
        error("You also have to click the confirm checkbox", "Del_account.php");
    }
} else {
    session_destroy();
    session_start();
    error("You have to be logged in first");
}