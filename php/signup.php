<?php
//signup.php
include "connect.php";
if (isset($_POST['speler-naam'])) {
    if (!ctype_alpha($_POST['speler-naam'])) {
        $errors='De naam kan alleen letters bevatten';
        $_SESSION['errors']='De naam kan alleen letters bevatten';
        header('Location:login-front-end.php');
    }
}
else{
    $errors='De naam kan alleen letters bevatten';
    $_SESSION['errors']='Niet alle velden zijn ingevoerd ingevoerd';
    header('Location:login-front-end.php');
}
 if (!empty($errors)) {
    $email=$_POST['speler-email'];
    $speler=$_POST['speler-naam'];
    $telnummer=$_POST['speler-nummer'];
    $sql = "INSERT INTO spelers(`Speler-email`, `Speler-naam`, `Speler-telefoon`) VALUES('". $email ."', '". $speler ."', '".$telnummer. "')";

    $result = mysqli_query($conn, $sql);
    if (!$result) {

        //something went wrong, display the error
        echo 'Something went wrong while registering. Please try again later.';
        echo mysqli_error($conn);//debug shiit
    } else {
        //Header naar index
        header('Location:index.php');
    }
}