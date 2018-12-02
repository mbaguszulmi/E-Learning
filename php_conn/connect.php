<?php
$host = 'localhost';
$user = 'phpmyadmin';
$pass = 'password';
$db   = 'E-Learning';

$connect = mysqli_connect($host, $user, $pass, $db) or die('Unable to connect');
?>