<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="vraagscores.css"/>
    <title>Footgolf - Top scores</title>
</head>

<body>
    <div class="signin-signup">
        <form action="#" class="sign-in-form" method="post">
            <?php
            $holes=$_GET['holes'];
            if ($holes==18 || $holes==27){
                $req = require_once '../connect.php';
                if (!$req) {
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
                $spellen = mysqli_query($conn, "SELECT GroepNaam,GroepScore from `spellen` where Hole=$holes order by GroepScore");
                echo mysqli_error($conn);
                echo "
                            <table border='1'>
                             <th>Plaats</th>
                            <th>Team-naam:</th>
                            <th>Totale score</th>";
                echo "<tr>";
                $i = 1;
                $Groepnamen[0] = "jghdjghsighsdigo%hsrvbckvjsi*oeg3yiry34thdjhvdh";
                $j = 1;
                while ($row = mysqli_fetch_assoc($spellen)) {
                    $scores = $row['GroepScore'];
                    $j++;
                    if (isset($row['GroepNaam']) && !in_array($row['GroepNaam'], $Groepnamen)) {
                        echo '
                            <td>' . $i . '</td>
							<td>' . $row['GroepNaam'] . '</td>
							<td>' . $scores . '</td>
							</tr>
							';
                        $i++;
                        $Groepnamen[$j] = $row['GroepNaam'];
                        if ($i > 10) {
                            break;
                        }
                    }
                }
            }else{
                echo "<h1>Uuhhh, hoe kwam je hier?</h1>";
                header("location:../../index.php");
            }
            ?>
    </div>
</body>
<script src='../../Javascript/jquery.min.js'></script>
</html>
