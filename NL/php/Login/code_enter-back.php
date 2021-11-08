<?php
error_reporting(E_ALL);
include_once "../connect.php";
$speler=$_SESSION['user_name'];
echo gettype($speler)." = ".$speler."<br>";
$verify = $_GET['c'];
echo $verify . "<br>";
$email = $_SESSION['email'];
echo gettype($email)." = ".$email . "<br>";
$telnummer = (int)$_SESSION['telefoon'];
echo gettype($telnummer)." = ".$telnummer. "<br>";
if ($stmt = $conn->prepare("select * from `emailverify` where verifyCode=? && SpelerEmail=?")) {
    $stmt->bind_param("ss", $verify, $email);
    echo "bound <br>";
    if ($stmt->execute()) {
        echo "verified <br>";
        if ($stmt = $conn->prepare("INSERT INTO spelers(`Speler-email`, `Speler-naam`, `Speler-telefoon`) VALUES(?,?,?)")) {
        //if (mysqli_query($conn,"INSERT INTO spelers(`Speler-email`, `Speler-naam`, `Speler-telefoon`) VALUES(?,?,?)"))
            $stmt->bind_param('ssi', $email, $speler, $telnummer);
            echo "bound pt2";
            if ($stmt->execute()) {
                echo "inserted";
                $_SESSION['signed_in'] = true;
                $_SESSION['user_name'] = $speler;
                $_SESSION['email'] = $email;
                $_SESSION['telefoon'] = $telnummer;
                header("location: ../index.php");
            } else {
                session_destroy();
                session_start();
                $_SESSION['errors'] = "Er ging iets fout met het account in de database zetten, probeer aub opnieuw";
                echo "insert error" . mysqli_error($conn);
                //header("location:login-front-end.php");
            }
        } else {
            session_destroy();
            session_start();
            $_SESSION['errors'] = "Er ging iets fout met het params binden, probeer aub opnieuw" . mysqli_error($conn);
            echo "Bind error" . mysqli_error($conn);
            //header("location:login-front-end.php");
        }
    }
} else {
    $_SESSION['Errors'] = "Is de code die u heeft ingevoerd correct?";
    //header("location: code_enter.php");
}