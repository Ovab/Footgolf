<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

function RandomString($length): string
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

include_once "../../connect.php";
$email = $_POST['speler-email'];
$stmt = $conn->prepare("SELECT `Speler-email` FROM spelers WHERE `Speler-email` = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$row_cnt = $stmt->num_rows;
if ($row_cnt >= 1) {
    session_destroy();
    session_start();
    $_SESSION['errors'] = "Het lijkt er op dat een account met dit email adres al in de database staat";
    header("location: login-front-end.php");
    exit;
}
//Load Composer's autoloader
require '../../../vendor/autoload.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
    $email = $_POST['speler-email'];
    $_SESSION['user_name'] = $_POST['speler-naam'];
    $_SESSION['telefoon'] = $_POST['speler-nummer'];
    $_SESSION['email'] = $email;
    $i = 0;
    while ($i != 50) {
        mysqli_query($conn, "DELETE  FROM emailverify WHERE SpelerEmail=$email)");
        mysqli_query($conn, "DELETE  FROM emailverify WHERE Creation_dateTime<=DATE_SUB(NOW(), INTERVAL 5 minute)");
        $rand = RandomString(15);
        $stmt->free_result();
        $stmt = $conn->prepare("INSERT INTO `emailverify`(SpelerEmail, verifyCode) VALUES (?,?)");
        $stmt->bind_param("ss", $email, $rand);
        if ($stmt->execute()) {
            break;
        }
        if ($i == 49) {
            session_destroy();
            session_start();
            $_SESSION['errors'] = "We kunnen op dit moment niet de verificatie mail juist verzenden" . mysqli_error($conn);
            header("location: login-front-end.php");
            break;
        }
        $i++;
    }

    //Setup
    $username = "kennymeijer35@gmail.com"; //probs email adress
    $send_from = "kennymeijer@gmail.com"; //probs ook username
    $pass = "ndyysmxiklbobnwz";
    $mailServer = "smtp.gmail.com";
    $port = 587; //Is een int

    $reciever = $email;
    //Reciever
    $reciever_naam = $reciever;
    //Content
    // $msgHTML = "<a href='footgolf.bavoknol.nl/NL/php/Login/code_enter-back.php?c=$rand'>Klik deze link om uw email te bevestigen<br></a>";
    $msgHTML = "<a href='Localhost/Footgolf/NL/php/login/code_enter-back.php?c=$rand'>Klik deze link om uw email te bevestigen<br></a>";
    $altMSG = "Klik deze link om uw email te bevestigen
    Localhost/Footgolf/NL/php/login/code_enter-back.php?c=$rand";


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
    header("location: code_enter.php");
} catch (Exception $e) {
    session_destroy();
    session_start();
    $_SESSION['errors'] = "Er ging iets fout met het verzenden van de email, probeer aub opnieuw" . $mail->ErrorInfo;
    header("location: login-front-end.php");
}