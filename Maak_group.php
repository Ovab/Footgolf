<?php
include 'connect.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
echo ("<form method='post' action=''>
        <input type='submit' name='maak_group' class='button' value='maak_group'>
</form>");
} else{
    $_SESSION['groupID']=mysqli_query($conn, "insert into groep (Aanmaak_datum) VALUES(NOW()) ");
    mysqli_query($conn, "select groupID");
}