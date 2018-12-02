<?php
include $_SERVER['DOCUMENT_ROOT'].'/php_conn/connect.php';
$id_user = $_POST['id_user'];
$query = "SELECT nama_matpel, nilai FROM nilai n, matpel m WHERE m.id_matpel = (SELECT soal.id_matpel FROM soal WHERE id_soal = n.id_soal) 
AND id_user = $id_user";

$result = mysqli_query($connect, $query);

$data = array();
$nilai = array();
$matpel = array();
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    array_push($nilai, $row['nilai']);
    array_push($matpel, $row['nama_matpel']);
}
$data += ['matpel' => $matpel];
$data += ['nilai' => $nilai];

echo json_encode($data);
?>