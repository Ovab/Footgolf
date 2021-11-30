<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
            src="https://kit.fontawesome.com/64d58efce2.js"
            crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="holes.css" />
    <title>holes aantal</title>
</head>
<body>
<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form action="maak_groep.php" class="sign-in-form">
                <h2 class="title">18 Gholes</h2>
                <input type="hidden" value="18" name="holes">
                <button class="buttoneng">Start</button>
            </form>


            <form action="maak_groep.php" class="sign-up-form">
                <h2 class="title">27 Gholes</h2>
                <input type="hidden" value="27" name="holes">
                <input type="submit" value="start" class="buttonnl">
            </form>

        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>Kies uw aantal gholes</h3>
                <p>
                    blijf hier als je 18 gholes hebt, klik op 27 gholes voor 27 gholes
                </p>
                <button class="btn transparent" id="sign-up-btn">
                    27 gholes
                </button>
            </div>
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>Kies uw aantal holes</h3>
                <p>
                    blijf hier als je 27 gholes hebt, klik op 18 gholes voor 18 gholes
                </p>
                <button class="btn transparent" id="sign-in-btn">
                    18 holes
                </button>
            </div>
        </div>
    </div>
</div>

<script src="../../../app.js"></script>
</body>
</html>