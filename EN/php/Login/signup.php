<?php
//signup.php
include "../connect.php";
if (isset($_POST['speler-naam'])) {
    if (!ctype_alpha($_POST['speler-naam'])) {
        $errors = 'The name can only contain letters';
        $_SESSION['errors'] = $errors;
        header('Location:login-front-end.php');
    }
}
if (!isset($_POST['speler-nummer'])) {
    $_SESSION['errors'] = 'Enter a number';
    header('Location:login-front-end.php');
} else {
    $_SESSION['errors'] = 'Not all fields are filled in';
    header('Location:login-front-end.php');
}
if (empty($errors)) {
    $email = $_POST['speler-email'];
    $speler = $_POST['speler-naam'];
    $telnummer = $_POST['speler-nummer'];
    if ($stmt = $conn->prepare("INSERT INTO spelers(`Speler-email`, `Speler-naam`, `Speler-telefoon`) VALUES(?,?,$telnummer)")) {
        $stmt->bind_param('ss', $email, $speler);
        if ($stmt->execute()) {
            $_SESSION['signed_in'] = true;
            $_SESSION['user_name'] = $speler;
            header('Location:../../index.php');
        } else {
            $_SESSION['errors'] = 'Something went wrong trying to insert into the datebase, please try again';
            header('Location:login-front-end.php');
        }
    } else {
        $_SESSION['errors'] = 'Something went wrong trying to insert into the datebase, please try again';
        header('Location:login-front-end.php');
    }
}