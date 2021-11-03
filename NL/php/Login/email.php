<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader
require '../../../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
    include_once "../connect.php";
    $speler=$_SESSION['user_name'];
    $email=$_SESSION['email'];
    $telnummer=$_SESSION['telefoon'];
    $i=0;
    while ($i==$i) {
        mysqli_query($conn, "DELETE  FROM emailverify WHERE Creation_dateTime<=DATE_SUB(NOW(), INTERVAL 5 minute)");
        $rand = mt_rand(1000, 99999);
        $stmt = $conn->prepare("INSERT INTO `emailverify`(SpelerEmail, verifyCode) VALUES (?,?)");
        $stmt->bind_param("si",$email, $rand);
        if ($stmt->execute()) {echo "Yeet". $rand. $email;break;}
        if ($i<50){break;}
    }

    //Setup
    $username = "fg@bavoknol.nl";//probs email adress
    $send_from = "fg@bavoknol.nl";//probs ook username
    $pass = "Footgolf2%21";
    $mailServer = "mail.mijndomein.nl";
    $port = 587;//Is een int

    $reciever = "yeet@bavoknol.nl";
    //Reciever
    $reciever_naam = $reciever;
    //Content
    $msgHTML = "Uw verificatie code is: " . $rand. "<br>Deze code is 5 minuten geldig";
    $altMSG = "Uw verificatie code is: " . $rand. " deze code is 5 minuten geldig";



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

    $mail->send();

    //Zet hier je HTML
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: $mail->ErrorInfo";
}