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
if (!isset($_POST['speler-nummer']) or strlen((string)$_POST['speler-nummer']) == 9 and $_POST['speler-nummer'] < 0) {
    $_SESSION['errors'] = 'Voer een geldig Nummer in';
    $errors[0] = 'Voer nummer in';
    header('Location:login-front-end.php');
    die;
}
if (empty($errors)) {
    $_SESSION['user_name'] = $_POST['speler-naam'];
    $_SESSION['email'] = $_POST['speler-email'];
    $_SESSION['telefoon'] = $_POST['speler-nummer'];
    header('Location:email.php');
} else {
    $_SESSION['errors'] = 'Niet alle velden zijn correct ingevoerd ingevoerd';
    header('Location:login-front-end.php');
}