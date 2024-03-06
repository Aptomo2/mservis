<?php
session_start();
include "setting/koneksi.php";

?>
<!doctype html>
<html lang="en">
  <head>

    <link rel="stylesheet" href="css/daftar.css">

    <title>MServis - Daftar</title>
  </head>
  <body>


<!-- Navbar -->
	<?php include 'menu.php'; ?>

  <!-- Formulir Daftar -->
		<form action="#" method="post">
			<div class="signup">
				<h2> Daftar </h2>
			

				<div class="input-group">
					<input type="text" name="nama" required="">
					<span>Nama</span>
				</div>
				<div class="input-group">
					<input type="text" name="email" required="">
					<span>Email</span>
				</div>
				<div class="input-group">
					<input type="password" name="password" required="">
					<span>Password</span>
				</div>
				<div class="input-group">
					<input type="submit" name="daftar" value="Daftar">
				</div>
				<h5>Sudah Punya Akun? <a class="login" href="login.php"> Login</a> </h5>

			</div>
		</form>


		<?php

		if (isset($_POST["daftar"]))
		{
			$nama = $_POST["nama"];
			$email = $_POST["email"];
			$password = $_POST["password"];

			// Cek akun terdaftar

			$ambil = $koneksi->query("SELECT * FROM user WHERE email_pemesan='$email'");
			$akunterdaftar = $ambil->num_rows;
			if ($akunterdaftar==1)
			{
				echo "<script>alert('email sudah terdaftar');</script>";
                echo "<script>location=daftar.php;</script>";
			}
			else {
				$koneksi->query("INSERT INTO user (email_pemesan, password_pemesan, nama_pemesan) VALUES('$email','$password','$nama')");
				echo "<script>alert('berhasil mendaftar! silakan login ke akun anda!');</script>";
				echo "<script>location='login.php';</script>";
			}
		}
		?>

  </body>
</html>