 <?php
include 'connect.php';
 echo '<h1>Sign in</h1>';

 //first, check if the user is already signed in. If that is the case, there is no need to display this page
 // Now we check if the data from the login form was submitted, isset() will check if the data exists.
 if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
 {
     echo 'You are already signed in, you can <a href="signout.php">sign out</a> if you want.';
 }
 else
     if($_SERVER['REQUEST_METHOD'] != 'POST')
     {
         /*the form hasn't been posted yet, display it
           note that the action="" will cause the form to post to the same page it is on */
         echo '<form method="post" action="">
            email: <input type="text" name="speler-email" />
            <input type="submit" value="Sign in" />
         </form>';
     }
     else {
         if (!isset($_POST['speler-email'])) {
             // Could not get the data that should have been     sent.
             exit('Please fill both the username and password fields!');
         }
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
         if ($stmt = $conn->prepare('SELECT `speler-email`, `speler-naam`, `speler-telefoon` FROM spelers WHERE `Speler-email` = ?')) {
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