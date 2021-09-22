<?php
include '../connect.php';
//Kan je weg halen als je het form heb geremaked, is mainly voor testing
if($_SERVER['REQUEST_METHOD'] != 'POST'){
echo ("<link rel='stylesheet' href='style.css'>
<div class='wrapper'><form method='post' action=''>
        <input class='btn' type='submit' name='maak_group' class='button' value='Maak Groep'>
</form></div>");
} else{
    $naam1=$_SESSION['user_name'];
    //Genereer 5 digit random nummer
    $random= mt_rand(1000,99999);
    $insert=mysqli_query($conn,"insert into groep(groupID, Aanmaak_datum, `Speler_aantal`, Speler1) VALUES ($random, NOW(), 1, '$naam1')");
    if(!$insert){
        echo mysqli_error($conn)."<br>";
        echo 'Oeps er ging iets fout, probeer aub opnieuw';
    }
    else {
        //maak een session variable van het random nummer
        $_SESSION['groupID'] = $random;
        //Maak ID-maker de leider van de groep
        $_SESSION['groepLead'] = true;
        //
        $_SESSION['Speler_pos'] = 1;
        //Print het session variable, success met dit goed in de HTML zetten Lotfi ;)
        echo "Je group id is " . $random;
    }
}