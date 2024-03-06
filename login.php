<?php
session_start();
include "setting/koneksi.php";

?>
<!doctype html>
<html lang="en">
  <head>

    <link rel="stylesheet" href="css/login.css">

    <title>MServis - Login</title>
  </head>
  <body>

  <!-- Navbar -->
  <?php include 'menu.php'; ?>

			<!-- Formulir Login -->

			<form action="#" method="post">
				<div class="login">
					<h2> Login </h2>
					<div class="input-group">
						<input type="email" name="email" required="">
						<span>Email</span>
					</div>
					<div class="input-group">
						<input type="password" name="password" required="">
						<span>Password</span>
					</div>
					<div class="input-group">
						<input type="submit" name="submit" value="Login">
					</div>
					<h5>Belum ada akun? <a class="daftar" href="daftar.php"> Daftar</a> </h5>
				</div>
			</form>
		<?php

			if (isset($_POST["submit"]))
			{

				$email = $_POST["email"];
				$password = $_POST["password"];
				$ambil = $koneksi->query("SELECT * FROM user WHERE email_pemesan='$email' AND password_pemesan='$password'");
				$akunterdaftar = $ambil->num_rows;

				if ($akunterdaftar==1)
				{
					$akun = $ambil->fetch_assoc();
					$_SESSION["user"] = $akun;
					echo "<script>location='index.php';</script>";

				}
				else
				{
					echo "<script>alert('login gagal');</script>";
					echo "<script>location='login.php';</script>";
				}
			}

			?>
  </body>
</html>