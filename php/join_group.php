

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylegroep.css" />
    <title>Footgolf - Log in / Sign up</title>
</head>

<body>
<div class="container">
    <div class="forms-container">
        <!--Sign in form -->
        <div class="signin-signup">
            <form action="join_group_backend.php" class="sign-in-form" method="post">
                <h2 class="title">Voer Game Code </h2>

                <?php
                include 'connect.php';
                $errors=$_SESSION['Errors'];
                if (isset($_SESSION['Errors'])) {echo "<div class='error-text'>".$errors."</div>";}
                $errors=' ';
                unset($_SESSION['Errors'])
                ?>
<div class="input-field">
    <i class="fas fa-lock"></i>
    <input type="text" placeholder="GameCode" name="GroepID"/>
</div>
<input type="submit" class="btn" value="Log in" />
                <div class="panel right-panel">
                    <div class="content">
                        <h3>Een van ons?</h3>
                        <p>
                            Log in, om weer de leukste ervaring te beleven!
                        </p>
                        <button class="btn transparent" id="sign-in-btn">
                            Log in
                        </button>

<script src="../Javascript/app.js"></script>


</body>
<script src='../Javascript/jquery.min.js'></script>
</html>
