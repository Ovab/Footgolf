<?php
include_once '../connect.php';
//$user_input=isset($_POST['GroepID']);
$user_input=24243;
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
            $p_c=$player_aantal+=1;
            $speler_count='Speler'.$p_c;
            echo $speler_count."<br>";
            $speler_q="update groep set $speler_count = '$naam' where groupID=$user_input";
            //verhoog player aantal
            echo $speler_q."<br>";
            mysqli_query($conn, "update groep set `Speler_aantal`= Speler_aantal+1, $speler_count = '$naam' where groupID=$user_input");
            mysqli_query($conn, $speler_q);
            $_SESSION['Errors']=mysqli_error($conn);
            //Zet groepID
            $_SESSION['groupID'] = $user_input;
            print_r($_SESSION);
            //header("location:join_group.php");
            //Geef aantal spelers weer
            //echo "<h2 id='pc'> </h2>";
        }
    } else {
        $_SESSION['Errors']="yeet";
        $_SESSION['Errors'] = "Deze groep staat niet in onze database, probeer aub opnieuw".mysqli_error($conn);
        //header("location:join_group.php");
    }
}
else{
    $_SESSION['Errors']= "Onbekende error";
    header("location:join_group.php");
}
