<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <!--<link rel="stylesheet" href="../Funcs/vraagscores.css"/>-->
    <title>Footgolf - Top scores</title>
</head>

<body>
    <div class="signin-signup">
        <form action="#" class="sign-in-form" method="post">
            <?php
            $req=require_once '../connect.php';
            if(!$req){
                echo "We konden geen verbinding maken met de database, probeer aub opnieuw";
            }
            if (isset($_SESSION)) {
                error_reporting(E_ERROR | E_PARSE);
                $errors = $_SESSION['Errors'];
            }
            if (isset($_SESSION['Errors'])) {
                echo "<div class='error-text'>" . $errors . ". <br></div>";
            }
            unset($errors);
            unset($_SESSION['Errors']);
            //print_r($_POST);
            $GID = $_SESSION['groupID'];
            $spellen = mysqli_query($conn, "SELECT 
                                                Speler1+ifnull(Speler2,0)+ifnull(Speler3,0)+ifnull(Speler4,0) AS scores, 
                                                `GroepNaam` from `spellen`
                                                order by scores");
            echo mysqli_error($conn);
            echo "
                            <table border='1'>
                             <th>Plaats</th>
                            <th>Team-naam:</th>
                            <th>Totale score</th>";
            echo "<tr>";
            $i = 1;
            while ($row = mysqli_fetch_assoc($spellen)) {
                $scores=$row['scores'];
                if(!isset($row['GroepNaam'])) {
                    echo '
                            <td>' . $i . '</td>
							<td>' . $row['GroepNaam'] . '</td>
							<td>' . $scores . '</td>
							</tr>
							';
                    $i++;
                }
                else{
                    echo "i=".$i." al gepost team? ".$row['GroepNaam']."<br> score:".$scores."<br> <br>";
                    $i++;
                }
            }
            ?>
    </div>
</body>
<script src='../../Javascript/jquery.min.js'></script>
</html>
