<?php
//signup.php
include_once "../connect.php";
if (isset($_POST['speler-naam'])) {
    if (!ctype_alpha($_POST['speler-naam'])) {
        $errors[0] = 'De naam kan alleen letters bevatten';
        $_SESSION['errors'] = 'De naam kan alleen letters bevatten';
        header('Location:login-front-end.php');
    }
}
if (!isset($_POST['speler-nummer'])or strlen((string)$_POST['speler-nummer'])==9 and$_POST['speler-nummer']<0) {
    $_SESSION['errors'] = 'Voer een geldig Nummer in';
    $errors[0] = 'Voer nummer in';
    header('Location:login-front-end.php');
    die;
}
if (empty($errors)) {
    $email = $_POST['speler-email'];
    $speler = $_POST['speler-naam'];
    $telnummer = $_POST['speler-nummer'];
    if ($stmt = $conn->prepare("INSERT INTO spelers(`Speler-email`, `Speler-naam`, `Speler-telefoon`) VALUES(?,?,$telnummer)")) {
        $stmt->bind_param('ss', $email, $speler);
        if ($stmt->execute()) {
            echo "yeet";
            $_SESSION['signed_in'] = true;
            $_SESSION['user_name'] = $speler;
            $_SESSION['email']=$email;
            $_SESSION['telefoon']=$telnummer;
            //header('Location:../../index.php');
            header('Location:email.php');
        } else {
            $_SESSION['errors'] = 'Er is iets fout gegaan met het account in de database zetten, probeer aub opnieuw'. mysqli_error($conn);
            header('Location:login-front-end.php');
        }
    } else {
        $_SESSION['errors'] = 'Er is iets fout gegaan met het account in de database zetten, probeer aub opnieuw'. mysqli_error($conn);
        header('Location:login-front-end.php');
    }
} else {
    $_SESSION['errors'] = 'Niet alle velden zijn correct ingevoerd ingevoerd';
    header('Location:login-front-end.php');
}