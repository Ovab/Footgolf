<?php
$servername = "localhost";
$username = "root";
$password = "";
$database= 'footgolf';

// Create connection
$conn = new mysqli($servername, $username, $password, $database, 3306);

// Connection error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}