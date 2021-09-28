<?php
//signup.php
include "../connect.php";
if (isset($_POST['speler-naam'])) {
    if (!ctype_alpha($_POST['speler-naam'])) {
        $errors='De naam kan alleen letters bevatten';
        $_SESSION['errors']='De naam kan alleen letters bevatten';
        header('Location:login-front-end.php');
    }
}
if(!isset($_POST['speler-nummer'])){
    $_SESSION['errors']='Voer Nummer in';
    header('Location:login-front-end.php');
}
else{
    $_SESSION['errors']='Niet alle velden zijn ingevoerd ingevoerd';
    header('Location:login-front-end.php');
}
 if (empty($errors)) {
     $email = $_POST['speler-email'];
     $speler = $_POST['speler-naam'];
     $telnummer = $_POST['speler-nummer'];
     if ($stmt = $conn->prepare("INSERT INTO spelers(`Speler-email`, `Speler-naam`, `Speler-telefoon`) VALUES(?,?,$telnummer)")){
         $_SESSION['errors']='prepare pass <br>';
         $stmt->bind_param('ss', $email, $speler);
         if ($stmt->execute()) {
             $_SESSION['signed_in'] = true;
             $_SESSION['user_name'] = $speler;
             header('Location:../../index.html');
         } else {
             $_SESSION['errors'] = 'Er is iets fout gegaan met het account in de database zetten, probeer aub opnieuw';
             header('Location:login-front-end.php');
         }
     }
 }
     /*
//TODO:Veilig maken
    //$result = mysqli_query($conn, $sql);
    if (!$result) {
        $_SESSION['errors']='Er is iets fout gegaan, probeer het later opnieuw';
        header('Location:login-front-end.php');
    } else {
        //Header naar index
        header('Location:../../index.html');
    }
}*/