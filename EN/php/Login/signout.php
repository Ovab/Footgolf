<?php
include_once '../connect.php';
session_unset();
header('Location:login-front-end.php');
$_SESSION['errors'] = 'Logged out successfully';