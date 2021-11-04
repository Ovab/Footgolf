<?php
include_once "../connect.php";
$verify = $_POST['Vcode'];
$email = $_SESSION['email'];
$telnummer = $_SESSION['telefoon'];
if ($stmt = $conn->prepare("select * from `emailverify` where verifyCode=? && SpelerEmail=?")) {
    $stmt->bind_param("is", $verify, $email);
    echo"bound <br>";
    if ($stmt->execute()) {
        echo "verified <br>";
        if ($stmt = $conn->prepare("INSERT INTO spelers(`Speler-email`, `Speler-naam`, `Speler-telefoon`) VALUES(?,?,?)")) {
            $stmt->bind_param('ssi', $email, $speler, $telnummer);
            echo "bound pt2";
            if ($stmt->execute()) {
                echo "inserted";
                $_SESSION['signed_in'] = true;
                $_SESSION['user_name'] = $speler;
                $_SESSION['email'] = $email;
                $_SESSION['telefoon'] = $telnummer;
                header ("location: ../index.php");
            }
            else{
                session_destroy();
                session_start();
                $_SESSION['errors']="Er ging iets fout met het account in de database zetten, probeer aub opnieuw". mysqli_error($conn);
                echo "insert error".mysqli_error($conn);
                //header("location:login-front-end.php");
            }
        }
        else{
            session_destroy();
            session_start();
            $_SESSION['errors']="Er ging iets fout met het params binden, probeer aub opnieuw". mysqli_error($conn);
            echo "Bind error".mysqli_error($conn);
            //header("location:login-front-end.php");
        }
    }
} else {
    $_SESSION['Errors']="Is de code die u heeft ingevoerd correct?";
    header("location: code_enter.php");
}