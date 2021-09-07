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
 <html lang="en" xmlns="http://www.w3.org/1999/html">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Footgolf</title>


     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

 </head>
 <body>

 <div class="wrapper">
     <section class="form login">
         <header>Login</header>
         <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
             <div class="error-text"></div>
             <div class="name-details">
                 <div class="field input">
                     <label>Spelernaam</label>
                     <input type="text" name="speler-naam" placeholder="Enter your game name" required>
                 </div>
                 <div class="field input">
                     <label>Email</label>
                     <input type="text" name="speler-email" placeholder="Enter your email" required>
                 </div>
             </div>
             <div class="field button">
                 <input type="submit" name="submit" value="Continue to Play">
             </div>
         </form>
     </section>


 </div>
 </body>
