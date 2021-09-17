<?php
include_once "connect.php";
$groepID=$_SESSION['groepID'];
$sql = "SELECT Speler_aantal FROM groep where groupID=$groepID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data
    while($row = $result->fetch_assoc()) {
        //echo de data, dit refreshed elke paar sec (zie Score-front-end.php in script tag voor cooldown)
        $p_count=$row['speler_aantal'];
        echo"Aantal spelers in groep:'.$p_count.<br>";
    }
} else {
    echo "0 results";
}