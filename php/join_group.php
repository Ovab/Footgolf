<?php
include_once 'connect.php';
    echo "<form action='#' method='post'>
     <label>Wat is het groep nummer?</label>
        <input type='text' name='GroepID' id='GroepID'>
        <input type='submit'>
    </form>";
$user_input=isset($_POST['GroepID']);
$res=mysqli_query($conn, "select groupID, `Speler_aantal` from groep where groupID=$user_input");
//Check of query heeft gerunt
if($res) {
    //loop door de $row resultaten heen en doe het in $row
    while ($row = mysqli_fetch_assoc($res)) {
        $player_aantal=$row['Speler_aantal'];
    }
    //Als speler aantal groter of gelijk is aan 5 dan geeft hij die error
    if (isset($player_aantal)>=5){
        echo "Sorry deze groep zit vol";
    } else{
        //verhoog player aantal
        mysqli_query($conn, "update groep set `Speler_aantal`= Speler_aantal+1 where groupID=$user_input");
        //Zet groepID
        $_SESSION['groupID']=$user_input;
        print_r($_SESSION);
        //Geef aantal spelers weer
        echo "<h2 id='pc'> </h2>";
    }
} else{
    echo "Deze groep staat niet in onze database, probeer aub opnieuw";
}
?>
//dfskhskshghsdkslkjsdghjhkHkghfglslgkdghdkghshjlkg lgguyoisroigurkajsdhfhdsk fdahdLK";lkjfdh;JhJkLkhklsfskf hdsfkghks
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Footgolf - Score</title>
</head>
<body>
</body>
<script src='../Javascript/jquery.min.js'></script>
<script>
    //maak functie aan.
    function update_var() {
        jQuery.ajax({
            url: 'pc_fetch.php', //Script URL.
            method: 'POST', //Methode data doorgeven
            success: function (answer) {
                jQuery('#pc').html(answer);//update your div with new content ....
            },
            error: function () {
                //Iets ging fout, niet sure wat tho
                alert('shit brokey');
            }
        });
    }
    //Call de functie elke ~2.7 sec
    setInterval(function(){ update_var() }, 27000);
</script>
</html>
