<?php
include_once "../connect.php";
$groepID=$_SESSION['groupID'];
$sql = "SELECT SpelID, Speler1, Speler2, Speler3, Speler4, Speler5 FROM spellen where groupID=$groepID";
$sql2="select SPELER_AANTAL, SPELER1, SPELER2, SPELER3, SPELER4, SPELER5 from groep where groupID=$groepID";
$result = $conn->query($sql);
$result2 = $conn->query($sql2);
if ($result->num_rows > 0 && $result2->num_rows>0) {
// output data
    while ($row2 = $result2->fetch_assoc()) {
        $speler_aantal = $row2['SPELER_AANTAL'];
        $naam1 = $row2['SPELER1'];
        $naam2 = $row2['SPELER2'];
        $naam3 = $row2['SPELER3'];
        $naam4 = $row2['SPELER4'];
        $naam5 = $row2['SPELER5'];
    }
        while ($row = $result->fetch_assoc()) {
            //echo de data, dit refreshed elke paar sec (zie Score-front-end.php in script tag voor cooldown
            echo "SpelID: " . $row["SpelID"] . " <br>" . $naam1 . ": " . $row['Speler1'] . "<br>";
        }
        if ($speler_aantal == 2) {
            echo $naam2 . ": " . $row['Speler2'] . "<br>";
        }
    } else {
echo "Nog geen scores ingevoerd";
}