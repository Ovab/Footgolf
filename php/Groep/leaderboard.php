<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Funcs/vraagscores.css"/>
    <title>Footgolf - Vraag scores</title>
</head>

<body>
    <div class="signin-signup">
        <form action="#" class="sign-in-form" method="post">
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
            //print_r($_POST);
            $GID = $_SESSION['groupID'];
            $sql2 = "SELECT * FROM groep";
            $result2 = $conn->query($sql2);
            while ($row2 = $result2->fetch_assoc()) {
                $speler_aantal = $row2['SPELER_AANTAL'];
                $groepnaam = $row2['GroepNaam'];
                $naam1 = $row2['Speler1'];
                $naam2 = $row2['Speler2'];
                $naam3 = $row2['Speler3'];
                $naam4 = $row2['Speler4'];
            }
            $spellen = mysqli_query($conn, "SELECT 
                                                ifnull(Speler1,0)+ifnull(Speler2,0)+ifnull(Speler3,0)+ifnull(Speler4,0)/max(Hole) AS theCount, 
                                                `GroepNaam` from `spellen`
                                                GROUP BY `GroepNaam`ORDER BY theCount LIMIT 20");
            echo mysqli_error($conn);
            echo "
                            <table>
                             <th>Plaats</th>
                            <th>Team-naam:</th>
                            <th>Totale score</th>";
            echo "<tr>";
            $i = 0;
            while ($row = mysqli_fetch_assoc($spellen)) {
                $speler1 = $row['theCount'];
                $i++;
                echo '
                            <td>' . $i . '</td>
							<td>' . $row['GroepNaam'] . '</td>
							<td>' . floor($speler1) . '</td>
							</tr>
							';
            }
            $_SESSION ['tablepost'] = true;
            ?>
    </div>
</body>
<script src='../../Javascript/jquery.min.js'></script>
</html>
