<?php
session_start();
if (!isset($_SESSION['logged-in']) || !$_SESSION['logged-in']) {
	header("location:/");
}

$id_user = $_SESSION['id_user'];
$nama = $_SESSION['nama'];

include $_SERVER['DOCUMENT_ROOT'].'/php_conn/connect.php';
$query = "SELECT * FROM user WHERE id_user = $id_user";
$result = mysqli_query($connect, $query);
if ($result) {
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Settings</title>
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
						<li><a href="message.php">MESSAGES</a></li>
						<li><a href="achieve.php">ACHIEVEMENT</a></li>
						<li class="active"><a href="settings.php">SETTINGS</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div id="nav-section">
			<div id="nav-isi1">
				<div class="static">
					<b>Settings</b>
				</div>
				<form action="modif.php" method="POST">
					<table class="profil">
						<tr>
							<th>ID USER</th>
							<td>:</td>
							<td><?php echo $id_user ?></td>
							<input type="hidden" name="id_user" value="<?php echo $id_user ?>">
						</tr>
					</tr>
						<th>NAMA</th>
						<td>:</td>
						<td><input class="input" type="text" name="nama" value="<?php echo $row['nama']; ?>"></td>
					</tr>
					<tr>
						<th>EMAIL</th>
						<td>:</td>
						<td><input class="input" type="email" name="email" value="<?php echo $row['email']; ?>"></td>
					</tr>
					<tr>
						<th>NO TELEPON</th>
						<td>:</td>
						<td><input class="input" type="tel" name="telepon" value="<?php echo $row['telepon']; ?>"></td>
					</tr>
					<tr>
						<th>JENIS KELAMIN</th>
						<td>:</td>
						<td>
							<label><input type="radio" name="jk" value="Laki-Laki" <?php
							if ($row['jk'] == 'Laki-Laki') {
								echo "checked";
							}
							?> > Laki - laki</label>
							<label><input type="radio" name="jk" value="Perempuan" <?php
							if ($row['jk'] == 'Perempuan') {
								echo "checked";
							}
							?> > Perempuan</label>
							<?php
							?>
						</td>
					</tr>
					<tr>
						<th>ALAMAT</th>
						<td>:</td>
						<td><input class="input" type="text" name="alamat" value="<?php echo $row['alamat']; ?>"></td>
					</tr>
					</table>
					<input type="submit" class="btn blue" value="Submit">
				</form>
			</div>
		</div>
	</div></center>
	<div id="footer">
		<b>Penditium &copy 2018</b>
	</div>
	</body>
<html>