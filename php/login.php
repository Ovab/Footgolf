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
         if (!isset($_POST['speler-email'])) {
             // Could not get the data that should have been     sent.
             exit('Please fill both the username and password fields!');
         }
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
         if ($stmt = $conn->prepare('SELECT `speler-email`, `speler-naam`, `Speler-nummer` FROM spelers WHERE `Speler-email` = ?')) {
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
                 <h2 class="title">Sign in</h2>
                 <div class="input-field">
                     <i class="fas fa-user"></i>
                     <input type="text" placeholder="Username" />
                 </div>
                 <div class="input-field">
                     <i class="fas fa-phone"></i>
                     <input type="number" placeholder="Telefoon nummer" />
                 </div>
             </form>
             <form action="#" class="sign-up-form">
                 <h2 class="title">Sign up</h2>
                 <div class="input-field">
                     <i class="fas fa-user"></i>
                     <input type="text" placeholder="Username" />
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
                 <img src="img/Footgolf-logo.png" class="image2" alt="">
             </div>
         </div>
     </div>
 </div>

 <script src="../Javascript/app.js"></script>
 </body>
 </html>