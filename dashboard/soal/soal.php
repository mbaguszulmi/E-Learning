<!DOCTYPE html>
<html>
    <?php
    session_start();
    if (!isset($_SESSION['logged-in']) || !$_SESSION['logged-in']) {
        header("location:/");
    }
    
    $id_user = $_SESSION['id_user'];
    $nama = $_SESSION['nama'];

    if (!isset($_GET['id'])) {
        header("location:index.php");
    }
    else {
        $id_user = "1";
    }
    ?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Soal...</title>

        <link rel="stylesheet" href="../css/dashboard.css" type="text/css">
        <link rel="stylesheet" href="./assets/css/soal-style.css">

        <!--jQuery-->
        <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
              crossorigin="anonymous"></script>
              
        <script src="./assets/js/getsoal.js"></script>
    </head>

    <body>
    <div id="header">
            <div class="menu-login">
                <ul>
                    <li><a href="../"><?php echo $nama ?></a></li>
                    <li><a href="../logout.php">LOGOUT</a></li>
                </ul>
            </div>
            <div class="wrapper">
                <img src="../img/logoUM1.png">
                <img src="../img/logoUM2.png">
                <ul>
                    <li><a href="../index.php">HOME</a></li>
                    <li><a href="index.php">ALL COURSES</a></li>
                    <li><a href="">MEMBERS</a></li>
                    <li><a href="">ABOUT US</a></li>
                </ul>
            </div>
        </div>
        <div class="loader" id="loader">
            <div class="loader-inner">
                <div class="spinner"></div>
            </div>
        </div>
        <div class="soal-wrapper">
            <div class="detail">
                <h1 class="title" id="title">Judul Soal</h1>
                <h3 class="matpel" id="matpel">Mata Pelajaran</h3>
            </div>
            <div class="counter" id="counter"></div>
            <div class="working-area">
                <div id="soal">

                </div>
                <div id="jawaban">
                    
                </div>
            </div>
            <div class="next-wrapper">
                <button class="btn green" id="next">Next</button>
                <button class="btn blue" id="submit">Submit</button>
            </div>
        </div>
    </body>
</html>