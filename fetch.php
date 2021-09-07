<?php
if ($stmt = $conn->prepare('SELECT `Speler1`, `Speler2`, `Speler3`, `Speler4` FROM spelers WHERE `Speler-email` = ?')) {
    $stmt->bind_param('s', $_SESSION['speler-email']);
    $stmt->execute();
}