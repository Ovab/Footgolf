<?php

//signup.php
include "connect.php";

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    /*the form hasn't been posted yet, display it
      note that the action="" will cause the form to post to the same page it is on */
    echo '<form method="post" action="">
       
     </form>';
} else {
    $errors = array();

    if (isset($_POST['speler-naam'])) {
        if (!ctype_alpha($_POST['speler-naam'])) {
            $errors[] = 'De naam kan alleen letters bevatten';
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
        //Header naar index
        }
    }
}
?>

<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>

    <img class="image" src="img/Footgolf.png">



  <div class="wrapper">
    <section class="form signup">
      <header>Signup</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="speler-email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Name</label>
          <input type="text" name="speler-naam" placeholder="Enter your game name" required>
        </div>
        <div class="field input">
            <label>Tel Nummer</label>
            <input type="number" name="speler-nummer" placeholder="Enter your phone number">
        </div>

        <div class="field button">
          <input type="submit" name="submit" value="Continue to play">
        </div>
      </form>
    </section>
  </div>






</body>
</html>

