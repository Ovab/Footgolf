<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

function RandomString($length)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


//Load Composer's autoloader
require '../../../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
    include_once "../connect.php";
    $email = $_SESSION['email'];
    $i = 0;
    while ($i != 50) {
        mysqli_query($conn, "DELETE  FROM emailverify WHERE SpelerEmail=$email)");
        mysqli_query($conn, "DELETE  FROM emailverify WHERE Creation_dateTime<=DATE_SUB(NOW(), INTERVAL 5 minute)");
        $rand = RandomString(15);
        //$rand = mt_rand(1000, 99999);
        $stmt = $conn->prepare("INSERT INTO `emailverify`(SpelerEmail, verifyCode) VALUES (?,?)");
        $stmt->bind_param("ss", $email, $rand);
        if ($stmt->execute()) {
            break;
        }
        $i++;
    }

    //Setup
    $username = "fg@bavoknol.nl";//probs email adress
    $send_from = "fg@bavoknol.nl";//probs ook username
    $pass = "Footgolf2%21";
    $mailServer = "mail.mijndomein.nl";
    $port = 587;//Is een int

    //Reciever
    $reciever = $email;
    $reciever_naam = $reciever;
    //Content
    $msgHTML = "Jammer dat je je account wilt verwijderen<br><a href='footgolf.bavoknol.nl/NL/php/Login/code_enter-back.php?c=$rand'>Klik op deze link om je account te verwijderen</a>";
    $altMSG = "Jammer dat je je account wilt verwijderen, klik op deze link om door te gaan footgolf.bavoknol.nl/NL/php/Login/code_enter-back.php?c=$rand";


    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();
    $mail->Host = $mailServer;
    $mail->SMTPAuth = true;
    $mail->Username = $username;
    $mail->Password = $pass;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = $port;                                //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($send_from, $username);
    $mail->Sender = $send_from;
    $mail->AddReplyTo($send_from, $username);
    $mail->addAddress($reciever, $reciever_naam);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Bevestig email Footgolf';
    $mail->Body = $msgHTML;
    $mail->AltBody = $altMSG;
    print $rand;

    $mail->send();
    header ("location: code_enter.php");
} catch (Exception $e) {
    session_destroy();
    session_start();
    $_SESSION['errors'] = "Er ging iets fout met het verzenden van de email, probeer aub opnieuw";
    header("login-front-end.php");
}