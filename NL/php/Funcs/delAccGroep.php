<?php
include_once '../../connect.php';
$GID = $_SESSION['groupID'];
echo $GID;
$player = "Speler" . $_GET['player'];
$q = mysqli_query($conn, "UPDATE `groep` SET $player = NULL WHERE groupID = $GID");

if ($_GET['player'] == 2) {
    mysqli_query($conn, "UPDATE `groep` SET Speler_aantal=Speler_aantal-1 WHERE groupID= $GID");
    mysqli_query($conn, "UPDATE `groep` SET Speler2=Speler3   WHERE groupID= $GID");
    mysqli_query($conn, "UPDATE `groep` SET Speler3=Speler4   WHERE groupID= $GID");
    mysqli_query($conn, "UPDATE `groep` SET Speler4=NULL   WHERE groupID= $GID");
}
if ($_GET['player'] == 3) {
    mysqli_query($conn, "UPDATE `groep` SET Speler_aantal=Speler_aantal-1 WHERE groupID= $GID");
    mysqli_query($conn, "UPDATE `groep` SET Speler3=Speler4   WHERE groupID= $GID");
    mysqli_query($conn, "UPDATE `groep` SET Speler4=NULL   WHERE groupID= $GID");
}
if ($_GET['player'] == 4) {
    mysqli_query($conn, "UPDATE `groep` SET Speler_aantal=Speler_aantal-1 WHERE groupID= $GID");
}
if ($q) {
    header("location:Group_manager.php");
}
if (!$q) {
    echo "failed";
}