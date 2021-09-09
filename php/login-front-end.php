<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
$errors=$_SESSION['errors'];
echo $errors;
$errors=' ';
unset($_SESSION['errors'])
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
     <title>Footgolf - Log in / Sign up</title>
 </head>
 <body>
 <div class="container">
     <div class="forms-container">
         <div class="signin-signup">
             <form action="signin.php" class="sign-in-form" method="post">
                 <h2 class="title">Log in</h2>
                 <div class="input-field">
                     <i class="fas fa-user"></i>
                     <input type="text" placeholder="email" name="speler-email"/>
                 </div>
                 <div class="input-field">
                     <i class="fas fa-phone"></i>
                     <input type="number" placeholder="Telefoon nummer" name="speler-nummer"/>
                 </div>
                 <input type="submit" class="btn" value="Log in" />
             </form>
<!-- Signup form  -->
             <form action="signup.php" class="sign-up-form" method="post">
                 <h2 class="title">Sign up</h2>
                 <div class="input-field">
                     <i class="fas fa-user"></i>
                     <input type="text" placeholder="Spelernaam" name="speler-naam"/>
                 </div>
                 <div class="input-field">
                     <i class="fas fa-envelope"></i>
                     <input type="email" placeholder="Email" name="speler-email"/>
                 </div>
                 <div class="input-field">
                     <i class="fas fa-phone"></i>
                     <input type="number" placeholder="Telefoon nummer" name="speler-nummer"/>
                 </div>
                 <input type="checkbox" checked="checked" style="display: none" name="Signup"/>
                 <input type="submit" class="btn" value="Registreer" />
                 <img src="../img/footgolf5.png" class="image2">
             </form>
         </div>
     </div>

     <div class="panels-container">
         <div class="panel left-panel">
             <div class="content">
                 <h3>Nieuw hier?</h3>
                 <p>
                     Registreer nu om de ultieme Footgolf ervaring te beleven?
                 </p>
                 <button class="btn transparent" id="sign-up-btn">
                     Registreer
                 </button>
                 <img src="../img/Footgolf-logo.png" class="image" alt="" />
             </div>
         </div>
         <div class="panel right-panel">
             <div class="content">
                 <h3>Een van ons?</h3>
                 <p>
                     Log in, om weer de leukste ervaring te beleven!
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