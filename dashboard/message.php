<?php
session_start();
if (!isset($_SESSION['logged-in']) || !$_SESSION['logged-in']) {
	header("location:/");
}

$id_user = $_SESSION['id_user'];
$nama = $_SESSION['nama'];
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Messages</title>
		<link rel="stylesheet" href="css/dashboard.css" type="text/css">
	</head>
	<body>
	<div id="header">
		<div class="menu-login">
			  <ul>
				<li><a href="./"><?php echo $nama ?></a></li>
				<li><a href="logout.php">LOGOUT</a></li>
			  </ul>
		</div>
		<div class="wrapper">
			<img src="img/logoUM1.png">
			<img src="img/logoUM2.png">
			<ul>
				<li><a href="/">HOME</a></li>
				<li><a href="./soal">ALL COURSES</a></li>
				<li><a href="">MEMBERS</a></li>
				<li><a href="/about.php">ABOUT US</a></li>
			</ul>
		</div>
	</div>
	<center><div id="body">
		<div id="nav">
			<img class="image1" src="img/profil.png">
			<div id="nav2">
				<b><div class="font"><?php echo $nama ?></div></b>
				<div class="sidebar">
					<ul>
						<li><a href="index.php">DASHBOARD</a></li>
						<li><a href="profile.php">PROFILE</a></li>
						<li><a href="soal">COURSES</a></li>
						<li><a href="activity.php">ACTIVITY</a></li>
						<li><a href="notif.php">NOTIFICATION</a></li>
						<li class="active"><a href="message.php">MESSAGES</a></li>
						<li><a href="achieve.php">ACHIEVEMENT</a></li>
						<li><a href="settings.php">SETTINGS</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div id="nav-section">
			<div id="nav-isi1">
				<div class="static">
					<b>Messages</b>
				</div>
				<div class="bar1">
					<a href=""><div class="bar2">Private</div></a>
					<a href=""><div class="bar3">Publics</div></a>
				</div>
			</div>
		</div>
	</div></center>
	<div id="footer">
		<b>Penditium &copy 2018</b>
	</div>
	</body>
<html>