<?php
include_once 'connect.php';
if (isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) {
    echo 'You are already signed in, you can <a href="../php/signout.php">sign out</a> if you want.';
} else {
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
    if ($stmt = $conn->prepare('SELECT `speler-email`, `speler-naam`, `Speler-telefoon` FROM spelers WHERE `Speler-email` = ?')) {
        $stmt->bind_param('s', $_POST['speler-email']);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();
        $sql = "SELECT `Speler-naam` FROM spelers WHERE `Speler-telefoon` = '" . $_POST['speler-nummer'] . "' and `Speler-email` ='".$_POST['speler-email']."' ";
        $result = mysqli_query($conn, $sql);
        if ($stmt->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION['signed_in'] = true;
                $_SESSION['user_name'] = $row['Speler-naam'];
                print_r($_SESSION);
            }
        } else {
            // Incorrect password
            echo 'Incorrect username and/or password!';
        }
    } else {
        // Incorrect username
        echo 'Incorrect username and/or password!';
    }

    $stmt->close();
}