<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="holes.css"/>
    <title>Footgolf - Aantal-holes</title>
</head>

<body>
<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <h2 class="title">Hoeveel holes gaat u spelen?</h2>
            <div class="number18">
                <form action="maak_groep.php" method="post">
                    <input type="hidden" value="18" name="holes">
                    <input class="btn" type="submit" value="18"/>
                </form>
            </div>

            <!--<div class="number27">-->
            <form action="maak_groep.php" method="post">
                <input type="hidden" value="27" name="holes">
                <input class="btn" type="submit" value="27"/>
            </form>

        </div>
    </div>

</div>

</body>
</html>