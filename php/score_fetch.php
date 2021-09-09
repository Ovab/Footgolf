<?php
include_once "connect.php";
$sql = "SELECT SpelID, Hole, Afstand, Norm, Score FROM spellen";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "SpelID: ". $row["SpelID"]." Score ".$row['Score']. "<br>";
}
} else {
echo "0 results";
}