<?php
include_once 'connect.php';
session_destroy();
header('login.html');