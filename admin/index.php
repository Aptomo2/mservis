<?php 
session_start();
$koneksi = new mysqli("localhost","root","","mservis");

if (!isset($_SESSION['admin']))
{
    echo "<script>location='loginadmin.php';</script>";
    header('location:loginadmin.php');
    exit();
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>Admin</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
       <a class="navbar-brand" href="index.php">Hallo Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="index.php">Daftar Jasa <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="daftarpemesanan.php">Daftar Pemesanan</a>
                <a class="nav-item nav-link" href="daftarharga.php">Daftar Harga</a>
                <a class="nav-item nav-link" href="logoutadmin.php">Logout</a>
            </div>
        </div>
    </div>
    </nav>

    <div class="container con-admin">
   
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Foto Produk</th>
                    <th>Deskripsi Produk</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $ambil=$koneksi->query("SELECT * FROM produk");?>
                <?php while($pecah = $ambil->fetch_assoc()){; ?>
                <tr>
                    <td><?php echo $pecah['nama_produk']; ?></td>
                    <td>
                        <img src="../img/fotoproduk/<?php echo $pecah['foto_produk']; ?>" width="100">
                    </td>
                    <td><?php echo $pecah['deskripsi_produk']; ?></td>
                    <td>
                        <a href="hapusproduk.php?id=<?php echo $pecah['id_produk'] ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <a href="tambahproduk.php" class="btn btn-primary">Tambah Produk</a>
        <br>

     </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

