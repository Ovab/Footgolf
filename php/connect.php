<?php
//variablen voor inloggen
//Server adress
$servername = "localhost";
//server gebruikersnaam
$username = "root";
<<<<<<< Updated upstream:connect.php
//server wachtwoord
$password = "";
=======
$password = "root";
>>>>>>> Stashed changes:php/connect.php
$database= 'footgolf';

// Create connection
$conn = new mysqli($servername, $username, $password, $database, 3306);

// Connection error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}
<<<<<<< Updated upstream:connect.php

session_start();

=======
>>>>>>> Stashed changes:php/connect.php
