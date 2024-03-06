<?php 
$koneksi = new mysqli("localhost","root","","mservis");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Admin-Tambah Produk</title>
  </head>
  <body>

    
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="index.php">Daftar Jasa <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="daftarpemesanan.php">Daftar Pemesanan</a>
                <a class="nav-item nav-link" href="daftarjasa.php">Daftar Jasa</a>
                <a class="nav-item nav-link" href="logoutadmin.php">Logout</a>
            </div>
        </div>
    </div>
    </nav>

    
    <div class="container tambah-produk">
    <h1>Tambah Produk</h1>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama">
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea type="number" class="form-control" name="deskripsi" rows="10"></textarea>
            </div>

            <div class="form-group">
                <label>Foto Produk</label>
                <input type="file" class="form-control" name="foto">
            </div>
            
            
            <button class="btn btn-primary" name="save">simpan</button>
        </form>
    </div>

    <?php 
    if (isset($_POST['save']))
    {
        $foto = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];
        move_uploaded_file($lokasi, "../img/fotoproduk/".$foto);
        $koneksi->query("INSERT INTO produk (nama_produk,foto_produk,deskripsi_produk) VALUES('$_POST[nama]','$foto','$_POST[deskripsi]')");
        echo "string";
    }
    ?>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>