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
	<?php
	include $_SERVER['DOCUMENT_ROOT'].'/php_conn/connect.php';

	$query = "SELECT tanggal, nama_soal FROM nilai n, soal s WHERE n.id_soal = s.id_soal AND n.id_user = $id_user ORDER BY tanggal DESC";
	$result = mysqli_query($connect, $query);
	?>

	<head>
		<title>Activity</title>
		<link rel="stylesheet" href="css/dashboard.css" type="text/css">
		<!--jQuery-->
        <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>

        <!--Datatable-->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
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
						<li class="active"><a href="activity.php">ACTIVITY</a></li>
						<li><a href="notif.php">NOTIFICATION</a></li>
						<li><a href="message.php">MESSAGES</a></li>
						<li><a href="achieve.php">ACHIEVEMENT</a></li>
						<li><a href="settings.php">SETTINGS</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div id="nav-section">
			<div id="nav-isi1">
				<div class="static">
					<b>Activity</b>
				</div>

				<table id="activity-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Tanggal</th>
							<th>Nama Aktivitas</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($result) {
							$num = 1;
							while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
								echo "<tr>";
								echo "<td>".$num++."</td>";
								echo "<td>".$row['tanggal']."</td>";
								echo "<td>Mengerjakan soal ".$row['nama_soal']."</td>";
								echo "</tr>";
							}
						}
						?>
					</tbody>
				</table>

				<script>
				$(document).ready(function () {
					$("#activity-table").DataTable();
				});
				</script>
			</div>
		</div>
	</div></center>
	<div id="footer">
		<b>Penditium &copy 2018</b>
	</div>
	</body>
<html>