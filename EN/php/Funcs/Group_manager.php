<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="  https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../stylegroep.css"/>
    <title>Footgolf - Group manager</title>
</head>

<body>
<div class="container">
    <div class="forms-container">
        <!--Sign in form -->
        <div class="signin-signup">
            <h2 class="title" style="margin-left: 3%">Group manager </h2>

            <?php
            include_once '../connect.php';
            if (isset($_SESSION['groepLead'])) {
                if (isset($_SESSION)) {
                    error_reporting(E_ERROR | E_PARSE);
                    $errors = $_SESSION['Errors'];
                }
                if (isset($_SESSION['Errors'])) {
                    echo "<div class='error-text'>" . $errors . ". <br></div>";
                }
                unset($errors);
                unset($_SESSION['Errors']);
                if (isset($_SESSION['groupID'])) {
                    $GID = $_SESSION['groupID'];
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
                    echo "<style>
                          table{
                          margin: 10px;
                          margin-top: 25%;
                          color: #555555;
                          text-align: center;
                          border: solid red;
                          }
                         th{
                          border: solid red;
                          border-width: 2px;
                          }
                          td{
                          border: solid red;
                          border-width: 2px;
                          }
                          </style>
                          
                             <table>
                             <th colspan='90%'>Group-name: $groepnaam </th>
                             <th colspan='10%'><a href='../Groep/team-naam.php'>Edit</a></th>
                             <tr>
                             <th colspan='100%'>Group-code: $GID </th><tr>
                             <th colspan='100%' style='border: none'>&nbsp</th><tr>
                            <th colspan='50%'>&nbsp$naam1&nbsp</th>
                            <td colspan='50%'>The leader can't be deleted</td>
                            <tr>";
                    if (isset($naam2)) {
                        echo "<th colspan='50%'>&nbsp$naam2&nbsp</th>
                    <td><a href='delAccGroep.php?player=2'>Delete</a> </td>
                    <tr>";
                    }
                    echo "<tr>";
                    if (isset($naam3)) {
                        echo "<th colspan='50%'>&nbsp$naam3&nbsp</th>
                    <td><a href='delAccGroep.php?player=3'>Delete</a> </td>
                    <tr>";
                    }

                    if (isset($naam4)) {
                        echo "<th colspan='50%'>&nbsp$naam4&nbsp</th>
                    <td><a href='delAccGroep.php?player=4'>Delete</a> </td>
                    <tr>";
                    }
                } else {
                    echo "yeet;";
                    header("location:../../index.php");
                }
            }
            ?>
        </div>
    </div>
</div>
<div class="panel right-panel">
    <div class="content">
        <h3>One of us?</h3>
        <p>
            Log in, to get the most of your experience!
        </p>
        <button class="btn transparent" id="sign-in-btn">Join</button>

</body>
</html>
