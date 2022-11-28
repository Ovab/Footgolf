<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="vraagscores.css" />
    <title>Footgolf - Top scores</title>
</head>

<body>
    <div class="container">

        <div class="signin-signup">
            <form action="#" class="sign-in-form" method="post">
                <?php
                $holes = $_GET['holes'];
                if ($holes == 18 || $holes == 27) {
                    $req = require_once '../../connect.php';
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
                    $random = mt_rand(8, $holes);
                    //print_r($_POST);
                    $GID = $_SESSION['groupID'];
                    // $spellen = mysqli_query($conn, "SELECT GroepNaam,GroepScore from `spellen` where Hole=$holes and GroepScore>=36 order by GroepScore");
                    $holesIdQuery = mysqli_query($conn, "SELECT groupID FROM `groep` WHERE num_holes = $holes");
                    $holesIds = mysqli_fetch_all($holesIdQuery);

                    // $spellen = mysqli_query($conn, "SELECT GroepNaam, Speler1, Speler2, Speler3, Speler4 FROM `spellen` WHERE groupID = $result");
                    // print_r(mysqli_fetch_all($spellen));

                    // Stores all the scores from each group
                    $allScores = [];

                    $temp = 0;

                    // Loop through all the groups and get the scores from each player
                    foreach ($holesIds as $groupId) {
                        // Get the group name and all the scores for each group
                        $spellen = mysqli_query($conn, "SELECT GroepNaam, Speler1, Speler2, Speler3, Speler4 FROM `spellen` WHERE groupID = $groupId[0]");
                        $groupScore = mysqli_fetch_all($spellen);
                        // Loop through the scores and add them up
                        foreach ($groupScore as $result) {
                            $temp = $temp + $result[1] + $result[2] + $result[3] + $result[4];
                        }
                        // Store the group name and total score for each group
                        $allScores[] = [$groupScore[0][0], $temp];
                        // reset temp
                        $temp = 0;
                    }

                    // create and fill $scores with all the total scores from each group
                    $scores = [];
                    for ($i = 0; $i < count($allScores); $i++) {
                        $scores[] = $allScores[$i][1];
                    }

                    // Sort the scores from high to low
                    rsort($scores);

                    // Remove duplicates from $scores
                    $scores = array_flip($scores);
                    $scores = array_flip($scores);
                    $scores = array_values($scores);

                    $newArray = [];

                    for ($i = 0; $i < count($scores); $i++) {
                        for ($j = 0; $j < count($allScores); $j++) {
                            if ($scores[$i] == $allScores[$j][1]) {
                                $newArray[] = $allScores[$j];
                            }
                        }
                    }

                    echo mysqli_error($conn);
                    echo "
                            <table border='1'>
                                <th>Plaats</th>
                            <th>Team-naam:</th>
                            <th>Totale score</th>";
                    $placement = 1;
                    for ($i = 0; $i < count($newArray); $i++) {
                        echo "<tr>";
                        echo '<td>' . $placement . '</td>';
                        echo '<td>' . $newArray[$i][0] . '</td>';
                        echo '<td>' . $newArray[$i][1] . '</td>';
                        echo '</tr>';
                        if ($newArray[$i + 1][1] != $newArray[$i][1]) {
                            $placement++;
                        }
                    }
                    echo "<a href='../../index.php' class='btn' style='text-decoration: none; text-align: center; font-size: large'>Home</a>";
                } else {
                    echo "<h1>Er ging iets fout, probeer het opnieuw.</h1>";
                    header("location:../../index.php");
                }
                ?>
        </div>
    </div>
</body>
<script src='../../Javascript/jquery.min.js'></script>

</html>