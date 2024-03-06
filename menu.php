<?php
include "setting/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MServis</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <nav class="sticky-top">
        <div class="wrapper">
            <div class="logo"><a href="">MServis</a></div>
            <div class="menu">
                <ul>
                    <li><a href="index.php#home">HOME</a></li>
                    <li><a href="index.php#jenisjasa">Layanan Kami</a></li>
                    <li><a href="jasa.php">Pesan Jasa</a></li>
                    <li><a href="index.php#contact">Kontak</a></li>
                    <!-- Kalau sudah login -->
                    <?php if (isset($_SESSION["user"])): ?>
                        <li><a>Akun</a>
                            <ul class="dropdown">
                                <li><a href="riwayatpemesanan.php">Pemesanan</a>
                                <li><a href="logout.php">Logout</a>
                            </ul>
                        </li>
                    <?php else: ?>

                        <!-- Kalau belum login -->
                        <li><a href="login.php">Login</a></li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>