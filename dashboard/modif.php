<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include $_SERVER['DOCUMENT_ROOT'].'/php_conn/connect.php';

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $id_user = $_POST['id_user'];

    $query = "UPDATE user SET
    nama = '$nama',
    email = '$email', 
    telepon = '$telepon', 
    jk = '$jk', 
    alamat = '$alamat'
    WHERE id_user = $id_user";

    $result = mysqli_query($connect, $query);

    if ($result) {
        header("location:/dashboard/settings.php");
    }
    else {
        header("location:/dashboard?fl=server-error");
    }
}
else {
    header("location:/");
}
?>