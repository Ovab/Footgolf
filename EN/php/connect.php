<?php
//variablen voor inloggen
//Server adress
$servername = "localhost";
//server gebruikersnaam
$username = "root";

//server wachtwoord
$password = "";

$database = 'footgolf';

// Create connection
$conn = new mysqli($servername, $username, $password, $database, 3306);

// Connection error
if ($conn->connect_error) {
    die("Connection to DB failed");

}
session_start();