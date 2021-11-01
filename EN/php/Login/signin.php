<?php
include_once '../connect.php';

if (isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) {
    $_SESSION['errors'] = 'You are already logged in you can <a href="signout.php">log out</a> if you want.';
    header('Location:login-front-end.php');
} else {
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
    if ($stmt = $conn->prepare('SELECT `speler-email`, `speler-naam`, `Speler-telefoon` FROM spelers WHERE `Speler-email` = ?')) {
        $stmt->bind_param('s', $_POST['speler-email']);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();
        $sql = "SELECT `Speler-naam` FROM spelers WHERE `Speler-telefoon` = '" . $_POST['speler-nummer'] . "' and `Speler-email` ='" . $_POST['speler-email'] . "' ";
        $result = mysqli_query($conn, $sql);
        if ($stmt->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION['signed_in'] = true;
                $_SESSION['user_name'] = $row['Speler-naam'];
                header("location:../../index.php");
            }
        } else {
            // Incorrect telefoon nummer
            $_SESSION['errors'] = 'Incorrect E-mail/Phone number';
            header('Location:login-front-end.php');
        }
    } else {
        // Incorrect username
        $_SESSION['errors'] = "We counln't find an account with that login information";
        header('Location:login-front-end.php');
    }

    $stmt->close();


}
