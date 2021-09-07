<?php
include 'connect.php';
//Kan je weg halen als je het form heb geremaked, is mainly voor testing
if($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo("<form method='post' action=''>
        <input type='text' name='groepcode' class='button' value='' placeholder='Groep code'>
</form>");
}
else {
    //Check of de input in de Database zit
    if ($stmt = $conn->prepare('SELECT groupID FROM groep WHERE `groupID` = ?')) {
        $stmt->bind_param('i', $_POST['groepcode']);
        $stmt->execute();
        //Maak session variables voor joiner
        $_SESSION['groepLead']= false;
        $_SESSION['groepID'] = $_POST['groepcode'];
        //testing shit
        print_r($_SESSION);
    }
}