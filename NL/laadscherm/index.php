<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="refresh" content="3; url = ../php/Login/login-front-end.php" />
    <title>Laden</title>
    <link rel="stylesheet" href="../css/loading" />
</head>

<body>
    <div class="wrap">
        <div class="loading">
            <div class="bounceball"></div>
            <div class="text">LADEN</div>
        </div>
    </div>
</body>

<?php
session_start();
if (isset($_POST["engels"])) {
  // echo "engels";
  $_SESSION["data"] = file_get_contents("../../EN.json");
} else if (isset($_POST["nederlands"])) {
  // echo "nederlands";
  $_SESSION["data"] = file_get_contents("../../NL.json");
}
?>

</html>