<?php
include_once '../../connect.php';
//error_reporting(E_ERROR | E_PARSE);
$user_input = $_POST['GroepID'];
//Check of data is doorgekomen
if (!empty($user_input)) {
    $res = mysqli_query($conn, "select groupID, `Speler_aantal`, `num_holes`, GroepNaam from groep where groupID=$user_input limit 1");
    if ($res) {
        //loop door de $row resultaten heen en doe het in $row
        while ($row = mysqli_fetch_assoc($res)) {
            $player_aantal = $row['Speler_aantal'];
            $holes = $row['num_holes'];
            $_SESSION['holes'] = $holes;
        }
        //Als speler aantal groter of gelijk is aan 5 dan geeft hij die error
        if ($player_aantal >= 4) {
            $_SESSION['Errors'] = "Sorry deze groep zit vol";
            header('location:join_group.php');
        } else {
            $naam = $_SESSION['user_name'];
            $speler_count = 'Speler' . $player_aantal += 1;
            //verhoog player aantal
            $speler_q = "update groep set $speler_count = '$naam' where groupID=$user_input";
            mysqli_query($conn, "update groep set `Speler_aantal`= Speler_aantal+1, $speler_count = '$naam' where groupID=$user_input");
            mysqli_query($conn, $speler_q);
            //Zet groepID
            $_SESSION['teamnaam'] = $row['GroepNaam'];
            $_SESSION['groupID'] = $user_input;
            $_SESSION['Speler_pos'] = $player_aantal;
            header('location:../../index.php');
            //Geef aantal spelers weer
        }
    } else {
        $_SESSION['Errors'] = "Deze groep staat niet in onze database, probeer aub opnieuw";
        header('location:join_group.php');
    }
} else {
    $_SESSION['Errors'] = "Onbekende error";
    header("location:join_group.php");
}
