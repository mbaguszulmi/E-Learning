<?php
include $_SERVER['DOCUMENT_ROOT'].'/php_conn/connect.php';

$email = $_POST['email'];
$password = $_POST['password'];
$password = sha1($password);

$query  = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($connect, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['admin-logged-in'] = true;

        header("location:./");
    }
    else {
        header("location:login.php?fl=fail");
    }
}
else {
    echo 'failed';
}
?>