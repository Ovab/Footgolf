<?php

//signup.php
include "connect.php";
echo '<h3>Sign up</h3>';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    /*the form hasn't been posted yet, display it
      note that the action="" will cause the form to post to the same page it is on */
    echo '<form method="post" action="">
        email: <input type="text" name="speler-email" /><br>
        Naam: <input type="text" name="speler-naam" /><br>
        06-Nummer: <input type="text" name="speler-nummer" /><br>
        <input type="submit" value="Sign up" />
     </form>';
} else {
    $errors = array();

    if (isset($_POST['speler-naam'])) {
        if (!ctype_alpha($_POST['speler-naam'])) {
            $errors[] = 'De naam kan alleen letters betvatten';
        }
    }
    else{
        echo("Niet alle velden zijn ingevoerd ingevoerd");
    }

    if (!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/ {
        echo 'Uh-oh.. a couple of fields are not filled in correctly..';
        echo '<ul>';
        foreach ($errors as $key => $value) /* walk through the array so all the errors get displayed */ {
            echo '<li>' . $value . '</li>'; /* this generates a nice error list */
        }
        echo '</ul>';
    } else {
        $email=$_POST['speler-email'];
        $speler=$_POST['speler-naam'];
        $telnummer=$_POST['speler-nummer'];
        $sql = "INSERT INTO spelers(`Speler-email`, `Speler-naam`, `Speler-nummer`) VALUES('". $email ."', '". $speler ."', '".$telnummer. "')";

        $result = mysqli_query($conn, $sql);
        if (!$result) {

            //something went wrong, display the error
            echo 'Something went wrong while registering. Please try again later.';
            echo mysqli_error($conn);//debug shiit
        } else {
            echo 'yurrr';
        }
    }
}
