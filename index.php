<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penditium</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/font/css/all.min.css">

    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    
        <?php
        session_start();
        if (isset($_SESSION['logged-in']) && $_SESSION['logged-in'] == true) {
            $id_user = $_SESSION['id_user'];
            $nama = $_SESSION['nama'];
            $sign = "LOGOUT";
            ?>
            <script>
            $(document).ready(function() {
                $("#account").attr("href", "/dashboard");
            });
            </script>
            <?php
        }
        else {
            $nama = "LOGIN";
            $sign = "SIGN UP";

            ?>
            <script>
            $(document).ready(function() {
                $("#sign").attr("href", "/signup.php");
            });
            </script>
            <?php
        }
        ?>

    <script src="./assets/js/script.js"></script>
</head>
<body>
  <div class="login" id="login" autocomplete="false">
    <form action="login.php" method="post" >
      <table class="login-form">
        <tr>
          <td>USERNAME</td>
        </tr>
        <tr>
          <td><input type="email" id="user" name="user" required autofocus></td>
        </tr>
      
        <tr>
          <td>PASSWORD</td>
        </tr>
        <tr>
          <td><input type="password" id="pass" name="password" required></td>
        </tr>
      </table>
      <br>
      <input type="checkbox" name="remember">REMEMBER ME <br>
      <br>
      <input type="submit" value="LOGIN" class="btn blue mh-5" name="login">
      <a href="signup.php" class="btn orange mh-5">SIGN UP</a>
    </form>
  </div>

    <div id="header">
		<div class="menu-login">
			  <ul>
				<li><a id="account" href="javascript:void(0)" onclick="toggleLogin()"><?php echo $nama ?></a></li>
				<li><a id="sign" href="/dashboard/logout.php"><?php echo $sign ?></a></li>
			  </ul>
		</div>
		<div class="wrapper">
			<img src="./assets/img/logoUM1.png">
			<img src="./assets/img/logoUM2.png">
			<ul>
				<li><a href="/">HOME</a></li>
				<li><a href="./soal">ALL COURSES</a></li>
				<li><a href="">MEMBERS</a></li>
				<li><a href="/about.php">ABOUT US</a></li>
			</ul>
		</div>
	</div>

  <content>
  	<img src="./assets/img/um1.jpg">
  	<div class="content-wrapper">
  	  <ul>
  	  	<li>
    	  	<div class="box">
            <a href="">
      	  	  <i class="far fa-clone"></i>
      	  	  <p><br>STRATEGI</p>
            </a>
    	  	</div>
  	  	</li>
  	  	<li>
    	  	<div class="box">
            <a href="">
      	  	  <i class="far fa-edit"></i>
      	  	  <p><br>INFORMASI</p>
            </a>
    	  	</div>
  	  	</li>
  	  	<li>
    	  	<div class="box">
            <a href="">
      	  	  <i class="far fa-newspaper"></i>
      	  	  <p><br>DASHBOARD</p>
            </a>
    	  	</div>
  	  	</li>
  	  	<li>
    	  	<div class="box">
            <a href="">
      	  	  <i class="far fa-hourglass"></i>
      	  	  <p><br>KARDINALITAS</p>
            </a>
    	  	</div>
  	  	</li>
  	  </ul>

      <video controls width='500' src="./assets/video/1.mp4"></video>
  	  <div id="box">
  	    <img src="./assets/img/logoUM1.png">
  	    <img src="./assets/img/logoUM2.png">
  	  </div>
  	</div>
  </content>

  <footer>
  	<p>Penditium &copy; 2018 | Build By Kelompok 7</p>
  </footer>
</body>
</html>