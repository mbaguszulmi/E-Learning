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
		<title>Studies</title>
		<link rel="stylesheet" href="../css/dashboard.css" type="text/css">
		<link rel="stylesheet" href="./assets/css/index-style.css">

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
				<li><a href="../"><?php echo $nama ?></a></li>
				<li><a href="../logout.php">LOGOUT</a></li>
			  </ul>
		</div>
		<div class="wrapper">
			<img src="../img/logoUM1.png">
			<img src="../img/logoUM2.png">
			<ul>
				<li><a href="/">HOME</a></li>
				<li><a href="./">ALL COURSES</a></li>
				<li><a href="">MEMBERS</a></li>
				<li><a href="">ABOUT US</a></li>
			</ul>
		</div>
	</div>
	<center><div id="body">
		<div id="nav">
			<img class="image1" src="../img/profil.png">
			<div id="nav2">
				<b><div class="font"><?php echo $nama ?></div></b>
				<div class="sidebar">
					<ul>
						<li><a href="../index.php">DASHBOARD</a></li>
						<li><a href="../profile.php">PROFILE</a></li>
						<li class="active"><a href="../soal">COURSES</a></li>
						<li><a href="../activity.php">ACTIVITY</a></li>
						<li><a href="../notif.php">NOTIFICATION</a></li>
						<li><a href="../message.php">MESSAGES</a></li>
						<li><a href="../achieve.php">ACHIEVEMENT</a></li>
						<li><a href="../settings.php">SETTINGS</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div id="nav-section">
			<div id="nav-isi1">
				<div class="static">
					<b>Studies</b>
				</div>

				<div class="inner-wrapper">
					<table id="list-soal">
						<thead>
							<tr>
								<th>#</th>
								<th>Nama Soal</th>
								<th>Mata Pelajaran</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							include $_SERVER['DOCUMENT_ROOT'].'/php_conn/connect.php';

							$query = "SELECT id_soal, nama_soal, nama_matpel FROM soal s, matpel m WHERE s.id_matpel = m.id_matpel";
							$result = mysqli_query($connect, $query);

							if ($result) {
								$i=1;
								while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
									echo "<tr>";
									echo "<td>".$i++."</td>";
									echo "<td>".$row['nama_soal']."</td>";
									echo "<td>".$row['nama_matpel']."</td>";
									echo "<td class='btn-wrapper'><a class='btn blue' href='soal.php?id=".$row['id_soal']."'>Kerjakan</a></td>";
									echo "</tr>";
								}
							}
							?>
						</tbody>
					</table>
				</div>

				<script>
				$(document).ready(function () {
					$("#list-soal").DataTable();
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