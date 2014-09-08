<?php

session_start();

//Now you have access to the Session variable

// $_SESSION['count'] = isset($_SESSION['count']) ? $_SESSION['count'] : 0;

// echo $_SESSION['count'];

// $_SESSION['count']++;

$_SESSION['logged_in'] = isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : FALSE;
include('connect.php');

?>