<?php
include_once "../../connect.php";
$groepID = $_SESSION['groupID'];
//if(isset( $_SESSION['groepID'])) {
$sql = "SELECT Speler_aantal FROM groep where groupID=$groepID";
$sql2 = "SELECT SpelID, Speler1, Speler2, Speler3, Speler4, groupID FROM spellen where groupID=$groepID";
$result = $conn->query($sql);
$result2 = $conn->query($sql2);

while ($row2 = $result2->fetch_assoc()) {
    $speler_aantal = $row2['SPELER_AANTAL'];
    $naam1 = $row2['SPELER1'];
    $naam2 = $row2['SPELER2'];
    $naam3 = $row2['SPELER3'];
    $naam4 = $row2['SPELER4'];
}
if ($result->num_rows > 0) {
// output data
    while ($row = $result->fetch_assoc()) {
        //echo de data, dit refreshed elke paar sec (zie Score-front-end.php in script tag voor cooldown)
        $p_count = $row['speler_aantal'];
        echo "Aantal spelers in groep:'.$p_count.<br>";
        echo $naam1 . "(Leider) <br>";
        if ($speler_aantal >= 2) {
            echo $naam2 . "<br>";
        }

        if ($speler_aantal >= 3) {
            echo $naam3 . "<br>";
        }

        if ($speler_aantal >= 4) {
            echo $naam4 . "<br>";
        }
    }
} else {
    echo "0 results";
}
//}