<?php
include_once '../connect.php';
error_reporting(E_ERROR | E_PARSE);
$user_input=isset($_POST['GroepID']);
//$user_input=24243;
//Check of query heeft gerunt
if(!empty($user_input)) {
    $res=mysqli_query($conn, "select groupID, `Speler_aantal` from groep where groupID=$user_input");
    if ($res) {
        //loop door de $row resultaten heen en doe het in $row
        while ($row = mysqli_fetch_assoc($res)) {
            $player_aantal = $row['Speler_aantal'];
            echo $player_aantal;
        }
        //Als speler aantal groter of gelijk is aan 5 dan geeft hij die error
        if (isset($player_aantal) >= 5) {
            $_SESSION['Errors'] = "Sorry deze groep zit vol";
        } else {
            $_SESSION['Errors']=mysqli_error($conn);
            $naam=$_SESSION['user_name'];
            $speler_count='Speler'.$player_aantal+=1;
            $speler_q="update groep set $speler_count = '$naam' where groupID=$user_input";
            //verhoog player aantal
            mysqli_query($conn, "update groep set `Speler_aantal`= Speler_aantal+1, $speler_count = '$naam' where groupID=$user_input");
            mysqli_query($conn, $speler_q);
            $_SESSION['Errors']=mysqli_error($conn);
            //Zet groepID
            $_SESSION['groupID'] = $user_input;
            //header("location:join_group.php");
            //Geef aantal spelers weer
        }
    } else {
        $_SESSION['Errors'] = "Deze groep staat niet in onze database, probeer aub opnieuw".mysqli_error($conn);
        header("location:join_group.php");
    }
}
else{
    $_SESSION['Errors']= "Onbekende error";
    header("location:join_group.php");
}
