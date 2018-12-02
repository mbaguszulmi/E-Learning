<?php
session_start();
if (!isset($_SESSION['logged-in']) || !$_SESSION['logged-in']) {
    header("location:/");
}

$id_user = $_SESSION['id_user'];

echo $id_user;
?>