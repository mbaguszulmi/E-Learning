<html lang="en">
	<head>
		<title>About Us</title>
		<link rel="stylesheet" href="/dashboard/css/dashboard.css" type="text/css">
		<link rel="stylesheet" href="./assets/css/about.css">

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
	</head>
	<body>
	<div id="header">
		<div class="menu-login">
			<ul>
				<li><a id="account" href="javascript:void(0)" onclick="toggleLogin()"><?php echo $nama ?></a></li>
				<li><a id="sign" href="/dashboard/logout.php" onclick="toggleLogin()"><?php echo $sign ?></a></li>
			</ul>
		</div>
		<div class="wrapper">
			<img src="./assets/img/logoUM1.png">
			<img src="./assets/img/logoUM2.png">
			<ul>
				<li><a href="/">HOME</a></li>
				<li><a href="soal">COURSES</a></li>
				<li><a href="">MEMBERS</a></li>
				<li><a href="">GUIDE</a></li>
				<li><a href="about.php">ABOUT US</a></li>
				<li><a href=""><i class="fas fa-search"></i></a></li>
			</ul>
		</div>
	</div>
		<center><div id="nav-section2">
			<div class="content-wrapper">
				<br><br><b><div class="us"><font size="5">ABOUT US</font></b>
				
				<div class="grid">
					<div class="item">
						<div class="image bagus"></div>
						<h3>Muhammad Bagus Zulmi</h3>
						170535629515
					</div>
					<div class="item">
						<div class="image fajar"></div>
						<h3>Muhammad Fajar Ali Shodiq</h3>
						170535629539
					</div>
					<div class="item">
						<div class="image anam"></div>
						<h3>Muhammad Khoirul Anam</h3>
						170535629551
					</div>
				</div>

				<font size="5">SOSIAL MEDIA</font></b>
				<p><table border=0>
					<tr>
						<td width="60" align="center"><a href="" title="Line.E-Learning"><img src="./assets/img/1.png" height="40" width="40"></img></a></td>
						<td width="60" align="center"><a href="" title="Google+.E-Learning"><img src="./assets/img/2.png" height="40" width="40"></img></a></td>
						<td width="60" align="center"><a href="" title="Youtube.E-Learning"><img src="./assets/img/3.png" height="40" width="40"></img></a></td>
						<td width="60" align="center"><a href="" title="Facebook.E-Learning"><img src="./assets/img/4.png" height="40" width="40"></img></a></td>
						<td width="60" align="center"><a href="" title="Twitter.E-Learning"><img src="./assets/img/5.png" height="40" width="40"></img></a></td>
						<td width="60" align="center"><a href="" title="Instagram.E-Learning"><img src="./assets/img/6.png" height="40" width="40"></img></a></td>
					</tr>
				</table><br>
			</div>
		</div></center>
	<div id="footer">
  	&copy; copyright 2018 | Build By Team 7
	</div>
	</body>
<html>