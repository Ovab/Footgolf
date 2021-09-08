 <?php
include 'connect.php';

 //first, check if the user is already signed in. If that is the case, there is no need to display this page
 // Now we check if the data from the login form was submitted, isset() will check if the data exists.
 if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
 {
     echo 'You are already signed in, you can <a href="php/signout.php">sign out</a> if you want.';
 }
 else
     if($_SERVER['REQUEST_METHOD'] != 'POST'){

     }

     else {
         if (!isset($_POST['speler-naam'])) {
             // Could not get the data that should have been     sent.
             echo('Please fill both the username and password fields!');
             if(!ctype_alnum($_POST['speler-email']))
             {
                  echo'The username can only contain letters and digits.';
             }
         }
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
         if ($stmt = $conn->prepare('SELECT `speler-email`, `speler-naam`, `Speler-telefoon` FROM spelers WHERE `Speler-email` = ?')) {
             $stmt->bind_param('s', $_POST['speler-email']);
             $stmt->execute();
             // Store the result so we can check if the account exists in the database.
             $stmt->store_result();
             $sql = "SELECT `Speler-naam` FROM spelers WHERE `Speler-email` = '".$_POST['speler-email']."' ";
             $result = mysqli_query($conn,$sql);
             if ($stmt->num_rows > 0) {
                     while($row = mysqli_fetch_assoc($result))
                     {
                         $_SESSION['signed_in']=true;
                         $_SESSION['user_name']  = $row['Speler-naam'];
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
?>
 <?php

 //signup.php
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

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <script
             src="https://kit.fontawesome.com/64d58efce2.js"
             crossorigin="anonymous"
     ></script>
     <link rel="stylesheet" href="style.css" />
     <title>Sign in & Sign up Form</title>
 </head>
 <body>
 <div class="container">
     <div class="forms-container">
         <div class="signin-signup">
             <form action="#" class="sign-in-form">
                 <h2 class="title">Log in</h2>
                 <div class="input-field">
                     <i class="fas fa-user"></i>
                     <input type="text" placeholder="Username" />
                 </div>
                 <div class="input-field">
                     <i class="fas fa-phone"></i>
                     <input type="number" placeholder="Telefoon nummer" />
                 </div>
                 <input type="submit" class="btn" value="Log in" />
             </form>
             <form action="#" class="sign-up-form">
                 <h2 class="title">Sign up</h2>
                 <div class="input-field">
                     <i class="fas fa-user"></i>
                     <input type="text" placeholder="Spelernaam" />
                 </div>
                 <div class="input-field">
                     <i class="fas fa-envelope"></i>
                     <input type="email" placeholder="Email" />
                 </div>
                 <div class="input-field">
                     <i class="fas fa-phone"></i>
                     <input type="number" placeholder="Telefoon nummer" />
                 </div>
                 <input type="submit" class="btn" value="Registreer" />
             </form>
         </div>
     </div>

     <div class="panels-container">
         <div class="panel left-panel">
             <div class="content">
                 <h3>Nieuw hier?</h3>
                 <p>
                     Registreer nu om de ultieme Footgolf everaring te belevening?
                 </p>
                 <button class="btn transparent" id="sign-up-btn">
                     Registreer
                 </button>
                 <img src="img/Footgolf-logo.png" class="image" alt="" />
             </div>
         </div>
         <div class="panel right-panel">
             <div class="content">
                 <h3>Een van ons?</h3>
                 <p>
                     Log in, om weer te leukste ervaring te beleven
                 </p>
                 <button class="btn transparent" id="sign-in-btn">
                     Log in
                 </button>

             </div>
         </div>
     </div>
 </div>

 <script src="../Javascript/app.js"></script>
 </body>
 </html>