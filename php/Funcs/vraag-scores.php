<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../stylegroep.css"/>
    <title>Footgolf - Groep Join</title>
</head>

<body>
<div class="container">
    <div class="forms-container">
        <!--Sign in form -->
        <div class="signin-signup">
            <form action="#" class="sign-in-form" method="post">
                <h2 class="title">Voer groepscode in van het team van wie je de scores wilt </h2>

                <?php
                include_once '../connect.php';
                if (isset($_SESSION)) {
                    error_reporting(E_ERROR | E_PARSE);
                    $errors = $_SESSION['Errors'];
                }
                if (isset($_SESSION['Errors'])) {
                    echo "<div class='error-text'>" . $errors . ". <br></div>";
                }
                unset($errors);
                unset($_SESSION['Errors']);
                $GID=$_POST['GameCode'];
                //print_r($_POST);
                $sql2 = "SELECT * FROM groep where groupID=$GID";
                $result2 = $conn->query($sql2);
                while ($row2 = $result2->fetch_assoc()) {
                    $speler_aantal = $row2['SPELER_AANTAL'];
                    $groepnaam = $row2['GroepNaam'];
                    $naam1 = $row2['Speler1'];
                    $naam2 = $row2['Speler2'];
                    $naam3 = $row2['Speler3'];
                    $naam4 = $row2['Speler4'];
                }

                $spellen=mysqli_query($conn, "select * from spellen where groupID = $GID");
                echo "                        <table border='3'>
                                                                                                <th colspan='100%'>Groep-naam: $groepnaam </th><tr></tr>
                            <th>Hole</th>
                            <th>&nbsp$naam1&nbsp</th>
                            <th>&nbsp$naam2&nbsp</th>
                            <th>&nbsp$naam3&nbsp</th>
                            <th>&nbsp$naam4&nbsp</th>
                            <tr>
                ";
                				while($row = mysqli_fetch_assoc($spellen)) {
                    echo'   <style>
                              td{
                              text-align: center;
                              color: black;
                              }
                              th{
                              color: #333333;
                              }
                              
                            </style>
							<td>' . $row['Hole'] . '</td>
							<td>' . $row['Speler1'] . '</td>
							<td>' . $row['Speler2'] . '</td>
		                    <td>' . $row['Speler3'] . '</td>
							<td>' . $row['Speler4'] . '</td>
						  </tr>';
			    }
                ?>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="text" inputmode="numeric" pattern="[0-9]*" placeholder="GameCode" name="GameCode"/>
                </div>
                <input type="submit" class="btn" value="Join groep"/>

                <p id="pc"></p>

                <div class="panel right-panel">
                    <div class="content">
                        <h3>Een van ons?</h3>
                        <p>
                            Log in, om weer de leukste ervaring te beleven!
                        </p>
                        <button class="btn transparent" id="sign-in-btn">Join</button>

                        <script src="../../Javascript/app.js"></script>
</body>
<script src='../../Javascript/jquery.min.js'></script>
</html>
