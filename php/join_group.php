<?php
include_once 'connect.php';
    echo "<form action='#' method='post'>
     <label>Wat is het groep nummer?</label>
        <input type='text' name='GroepID' id='GroepID'>
        <input type='submit'>
    </form>";
$user_input=isset($_POST['GroepID']);
$res=mysqli_query($conn, "select groupID, `Speler-aantal` from groep where groupID=$user_input");
if($res) {
    while ($row = mysqli_fetch_assoc($res)) {
        $player_aantal=$row['Speler-aantal'];
    }
    if ($player_aantal>=4){
        echo "Sorry deze groep zit vol";
    }
    else{
        mysqli_query($conn, "update groep set `Speler-aantal`=$player_aantal+1 where groupID=$user_input");
        $row=$_SESSION['groupID'];
        echo '<h2> Aantal spelers in groep:' .$player_aantal  . '</h2><br>';
    }
}
else{
    echo "Deze groep staat niet in onze database, probeer aub opnieuw";
}