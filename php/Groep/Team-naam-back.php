<?php
include_once '../connect.php';
$userinput=$_POST['TeamNaam'];
if (isset($_SESSION['groupID'])) {
    $groupID = $_SESSION['groupID'];
    $insert = "UPDATE `groep` SET `GroepNaam` = '$userinput' WHERE groupID = $groupID";
    if ($stmt = $conn->prepare("UPDATE `groep` SET `GroepNaam` = ? WHERE groupID = ?")) {
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        $stmt->bind_param('si', $userinput, $groupID);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            echo mysqli_error($conn) . "<br>";
            echo 'Oeps er ging iets fout, probeer aub opnieuw';
            header('Location:team-naam.php');
        } else {
            $_SESSION['teamnaam'] = $userinput;
            printf($insert);
            echo "<br>";
            print_r($_SESSION);
            header('location:../../index.php');
        }
    } else {
        header('location:team-naam.php');
    }
}