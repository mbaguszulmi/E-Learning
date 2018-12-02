<?php
include $_SERVER['DOCUMENT_ROOT'].'/php_conn/connect.php';

$id_soal = $_POST['id_soal'];
$benar = $_POST['benar'];
$salah = $_POST["salah"];
$nilai = $_POST["nilai"];
$id_user = $_POST["id_user"];

$query = "INSERT INTO nilai(id_user, id_soal, benar, salah, nilai) VALUES
($id_user, $id_soal, $benar, $salah, $nilai)";
$result = mysqli_query($connect, $query);
mysqli_close($connect);
?>