<html lang="en">
	<head>
		<title>Sign Up</title>
		<link rel="stylesheet" href="./assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="./dashboard/css/dashboard.css" type="text/css">
	</head>
	<body>
	<div id="header">
		<div class="menu-login">
			<ul>
				<li><a href="javascript:void(0)" onclick="toggleLogin()">LOGIN</a></li>
				<li><a href="javascript:void(0)" onclick="toggleLogin()">SIGN UP</a></li>
			</ul>
		</div>
		<div class="wrapper">
			<img src="./assets/img/logoUM1.png">
			<img src="./assets/img/logoUM2.png">
			<ul>
				<li><a href="/">HOME</a></li>
				<li><a href="/dashboard/soal/">COURSES</a></li>
				<li><a href="">MEMBERS</a></li>
				<li><a href="">GUIDE</a></li>
				<li><a href="/about.php">ABOUT US</a></li>
				<li><a href=""><i class="fas fa-search"></i></a></li>
			</ul>
		</div>
	</div>
		<center><div id="nav-section2">
			<div id="nav-isin">
				<p><div class="fon3">Buat Akun Baru</div>
				<form action="sign.php" method="post">
					<table border="0" width="700">
						<tr>
							<br><th scope="row" width="150">NAMA</th>
							<td colspan="2">
								<input type="text" class="form-control" id="validationDefault03" name="nama" placeholder="Masukkan Nama Anda" required>
							</td>
						</tr>
						<tr>
							<th scope="row">EMAIL</th>
							<td colspan="2">
								<br><input type="email" class="form-control" id="validationDefault03" name="email" placeholder="Email" required>
							</td>
						</tr>
						<tr>
							<th scope="row">PASSWORD</th>
							<td colspan="2">
								<br><input type="password" class="form-control" id="validationDefault03" name="pass" id="exampleInputPassword1" placeholder="Password" required>
							</td>
						</tr>
						</tr>
							<th scope="row">NO TELEPON</th>
							<td colspan="2">
								<br><input type="text" class="form-control" id="validationDefault03" name="telepon" placeholder="Nomor Telepon" required>
							</td>
						</tr>
						<tr>
							<th>JENIS KELAMIN</th>
							<td>
								<label><input type="radio" class="mt-3" name="jk" value="Laki-Laki" required>Laki-Laki</label>
							</td>
							<td>
								<label><input type="radio" class="mt-3" name="jk" value="Perempuan" required>Perempuan</label>
							</td>
						</tr>
						<tr>
							<th scope="row">ALAMAT</th>
							<td colspan="2">
								<br><textarea class="form-control" name="alamat" id="validationDefault03" rows="3" placeholder="Masukkan Alamat" required></textarea>
							</td>
						<tr>
							<td colspan="3">
								<br><p align="Right"><button type="submit" class="btn btn-primary mb-2">Daftar</button>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div></center>
	<div id="footer">
  	&copy; copyright 2018 | Build By Team 7
	</div>
	</body>
<html>