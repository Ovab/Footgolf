<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="  https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Group_manager.css" />
    <title>Footgolf - Group manager</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="panels-container">
                <div class="panel left-panel">
                    <div class="content">
                        <h3>Group Manager</h3>
                        <p>
                            You can edit you group here.
                        </p>
                    </div>
                </div>
            </div>
            <!--Sign in form -->
            <div class="signin-signup">

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
                          z-index: 0;
                          margin: auto;
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
                          <div class='tablewrapper'>
                             <table>
                             <th colspan='90%'>Group-name: $groepnaam </th>
                             <th colspan='10%'><a href='../Groep/team-naam.php'>Edit</a></th>
                             <tr>
                             <th colspan='100%'>Group-code: $GID </th><tr>
                             <th colspan='100%' style='border: none'>&nbsp</th><tr>
                            <th colspan='50%'>&nbsp$naam1&nbsp</th>
                            <td colspan='50%'>The leader can't be deleted</td>
                            <tr></div>";
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
</body>

</html>