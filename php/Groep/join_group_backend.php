<?php
include_once '../connect.php';
$user_input=isset($_POST['GroepID']);
//Check of query heeft gerunt
if(!empty($user_input)) {
    $res=mysqli_query($conn, "select groupID, `Speler_aantal` from groep where groupID=$user_input");
    if ($res) {
        //loop door de $row resultaten heen en doe het in $row
        while ($row = mysqli_fetch_assoc($res)) {
            $player_aantal = $row['Speler_aantal'];
        }
        //Als speler aantal groter of gelijk is aan 5 dan geeft hij die error
        if (isset($player_aantal) >= 5) {
            $_SESSION['Errors'] = "Sorry deze groep zit vol";
        } else {
            //verhoog player aantal
            mysqli_query($conn, "update groep set `Speler_aantal`= Speler_aantal+1 where groupID=$user_input");
            //Zet groepID
            $_SESSION['groupID'] = $user_input;
            header("location:join_group.php");
            //Geef aantal spelers weer
            //echo "<h2 id='pc'> </h2>";
        }
    } else {
        $_SESSION['Errors'] = "Deze groep staat niet in onze database, probeer aub opnieuw";
        header("location:join_group.php");
    }
}
else{
    echo "fail";
    //header("location:join_group.php");
}
