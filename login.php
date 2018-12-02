<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include $_SERVER['DOCUMENT_ROOT'].'/php_conn/connect.php';

    $user = $_POST['user'];
    $pass = sha1($_POST['password']);

    $query = "SELECT * FROM user WHERE email = '$user' AND password = '$pass'";
    // echo $query;
    // echo $connect;
    $result = mysqli_query($connect, $query);
    // mysql_query()

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
    else {
        echo "Failed";
    }
}
else {
    header("location:/");
}
?>