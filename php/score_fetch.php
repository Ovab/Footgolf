<?php
include_once "connect.php";
$groepID=$_SESSION['groepID'];
$sql = "SELECT SpelID, Speler1, Speler2, Speler3, Speler4 FROM spellen where groupID=$groepID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data
while($row = $result->fetch_assoc()) {
    //echo de data, dit refreshed elke paar sec (zie Score-front-end.php in script tag voor cooldown)
echo "SpelID: ". $row["SpelID"]." <br> Score Speler 1: ".$row['Speler1']. "<br>" ."Score Speler 2: ".$row['Speler2']. "<br>"."Score Speler 3: ".$row['Speler3']. "<br>"."Score Speler 4: ".$row['Speler4']. "<br>";
    }
} else {
echo "0 results";
}