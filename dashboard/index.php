<!DOCTYPE html>
<html lang="en">
	<?php
		session_start();
		if (!isset($_SESSION['logged-in']) || !$_SESSION['logged-in']) {
			header("location:/");
		}
		
		$id_user = $_SESSION['id_user'];
		$nama = $_SESSION['nama'];

		include $_SERVER['DOCUMENT_ROOT'].'/php_conn/connect.php';

		$query = "SELECT DISTINCT id_soal FROM nilai WHERE id_user = $id_user";
		$result = mysqli_query($connect, $query);

		$units = 0;
		if ($result) {
			$courses = mysqli_num_rows($result);
			$units += $courses;
		}
		else {
			die ('Unable to connect!');
		}
	?>
	<head>
		<title>Dashboard</title>
		<link rel="stylesheet" href="css/dashboard.css" type="text/css">
		<!-- <script src="js/statistic.js"></script> -->

		<!--jQuery-->
		<script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>

		<!--Chart js-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
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
						<li class="active"><a href="index.php">DASHBOARD</a></li>
						<li><a href="profile.php">PROFILE</a></li>
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
			<div class="box1">
				<table>
					<tr>
						<td width="50"><div class="fon1"><b><?php echo $courses ?></b></div></td>
						<td width="10"><div class="fon2"><i>FINISHED COURSES</i></div></td>
					</tr>
				</table>
			</div>
			<div class="box2">
				<table>
					<tr>
						<td width="50"><div class="fon1"><b>0</b></div></td>
						<td width="10"><div class="fon2"><i>FINISHED QUIZES</i></div></td>
					</tr>
				</table>
			</div>
			<div class="box3">
				<table>
					<tr>
						<td width="50"><div class="fon1"><b>0</b></div></td>
						<td width="10"><div class="fon2"><i>FINISHED ASSIGNMENTS</i></div></td>
					</tr>
				</table>
			</div>
			<div class="box4">
				<table>
					<tr>
						<td width="50"><div class="fon1"><b><?php echo $units ?></b></div></td>
						<td width="10"><div class="fon2"><i>FINISHED UNITS</i></div></td>
					</tr>
				</table>
			</div>
			<div id="nav-isi1">
				<div class="static">
					<b>Student Statistics</b>
				</div>
				<div class="staticbox">
					<canvas id="nilai-chart" class="nilai-chart"></canvas>
					<script>
					var dataNilai;
					var ctx = document.getElementById('nilai-chart').getContext('2d');
					ctx.height = 300;
					var chartNilai;
					$(document).ready(function () {
						$.ajax({
							method: 'post',
							url: 'nilai.php',
							data: {
								id_user: <?php echo $id_user ?>
							},
							dataType: 'json',
							success: function(data) {
								console.log(data);
								dataNilai = data;
								initChart();
							}
						});
					});

					function initChart() {
						chartNilai = new Chart(ctx, {
							type: 'bar',
							data: {
								labels: dataNilai.matpel,
								datasets: [{
									label: 'Nilai',
									data: dataNilai.nilai,
									backgroundColor: 'rgba(255, 99, 132, 0.2)',
									borderColor: 'rgba(255,99,132,1)',
									borderWidth: 1
								}]
							},
							options: {
								scales: {
									yAxes: [{
										ticks: {
											beginAtZero:true
										}
									}]
								},
								responsive: true,
								maintainAspectRatio: true,
								aspectRatio: 3.13
							}
						});
					}
					</script>
				</div>
			</div>
			<div id="nav-isi2">
				<div class="progress">
					<b>Course Progress</b>
				</div>
			</div>
			<div id="nav-isi3">
				<div class="list">
					<b>Contact Administrator</b>
				</div>
				<p><br><br><br><br><br><br><p>
				<input class="komen" type="text" placeholder="Tulis Pesan..."></input>
				<input class="komen2" type="submit" value="kirim"></input>
			</div>
		</div>
	</div></center>
	<div id="footer">
		<b>Penditium &copy 2018</b>
	</div>
	</body>
<html>