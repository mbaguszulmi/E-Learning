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
		<title>Profile</title>
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
						<li class="active"><a href="profile.php">PROFILE</a></li>
						<li><a href="soal">COURSES</a></li>
						<li><a href="activity.php">ACTIVITY</a></li>
						<li><a href="notif.php">NOTIFICATION</a></li>
						<li><a href="message.php">MESSAGES</a></li>
						<li><a href="achieve.php">ACHIEVEMENT</a></li>
						<li><a href="settings.php">SETTINGS</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div id="nav-section">
				<div class="static">
					<b>Profile</b>
				</div>
			<div id="nav-isii1">
				<img class="image2" src="img/profil.png">
				<table class="profil">
				<tr>
						<th width=200>ID USER</th>
						<td width=15>:</td>
					<?php
						include $_SERVER['DOCUMENT_ROOT'].'/php_conn/connect.php';
						// $id_user = $_SESSION['id_user'];
						$query = "SELECT * FROM user where id_user = '$id_user'";
						
						$res = mysqli_query($connect, $query);
						
						if ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
							echo "<td>$row[0]</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<th>NAMA</th>";
							echo "<td>:</td>";
							echo "<td>$row[1]</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<th>EMAIL</th>";
							echo "<td>:</td>";
							echo "<td>$row[2]</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<th>NO TELEPON</th>";
							echo "<td>:</td>";
							echo "<td>$row[4]</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<th>JENIS KELAMIN</th>";
							echo "<td>:</td>";
							echo "<td>$row[5]</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<th>ALAMAT</th>";
							echo "<td>:</td>";
							echo "<td>$row[6]</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<th>CREATED ON</th>";
							echo "<td>:</td>";
							echo "<td>$row[7]</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<th>MODIFIED ON</th>";
							echo "<td>:</td>";
							echo "<td>$row[8]</td>";
							echo "</tr>";
						}
					?>
				</table>
				<a href="settings.php" class="btn blue">Settings</a>
			</div>
		</div>
	</div></center>
	<div id="footer">
		<b>Penditium &copy 2018</b>
	</div>
	</body>
<html>