<?php
include 'connect.php';
//Kan je weg halen als je het form heb geremaked, is mainly voor testing
if($_SERVER['REQUEST_METHOD'] != 'POST'){
echo ("<link rel='stylesheet' href='maakgroep.css'>
<div class='wrapper'><form method='post' action=''>
        <input class='btn' type='submit' name='maak_group' class='button' value='Maak Groep'>
</form></div>");
} else{
    //Genereer random nummer tussen 1000 en 9999
    $random= mt_rand(1000,9999);
    //Zet nummer in DB
    $_SESSION['groepID']=mysqli_query($conn, "insert into groep (groupID,Aanmaak_datum) VALUES($random,NOW()) ");
    //maak een session variable van het random nummer
    $_SESSION['groepID']= $random;
    //Maak ID-maker de leider van de groep
    $_SESSION['groepLead']= true;
    //Print het session variable, success met dit goed in de HTML zetten Lotfi ;)
    echo "Je group id is ".$random;
}