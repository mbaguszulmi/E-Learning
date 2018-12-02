<?php
include $_SERVER['DOCUMENT_ROOT'].'/php_conn/connect.php';

if(isset($_POST["nama"])){
	$nama=$_POST["nama"];
}
if(isset($_POST["email"])){
	$email=$_POST["email"];
}
if(isset($_POST["pass"])){
	$pass=sha1($_POST["pass"]);
}
if(isset($_POST["telepon"])){
	$telepon=$_POST["telepon"];
}
if(isset($_POST["jk"])){
	$jk=$_POST["jk"];
}
if(isset($_POST["alamat"])){
	$alamat=$_POST["alamat"];
}

$query="INSERT INTO user(nama, email, password, telepon, jk, alamat)
VALUES ('$nama','$email','$pass','$telepon','$jk','$alamat')";
$ok=mysqli_query($connect,$query);
if ($ok){
	$query = "SELECT * FROM user WHERE email = '$email'";
	$result = mysqli_query($connect, $query);

	if ($result) {
		if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            session_start();
            $_SESSION['logged-in'] = true;
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['nama'] = $row['nama'];

            header("location:/dashboard");
            echo 'success';
        }
        else {
            header("location:/?failed=true");
        }
	}
}
else {
	echo 'Anda Gagal Membuat akun. Silahkan Coba Kembali';
}
?>