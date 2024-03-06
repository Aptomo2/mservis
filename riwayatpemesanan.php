<?php
session_start();
include "setting/koneksi.php";
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/riwayatpemesanan.css">
    
    <title>Riwayat Pemesanan</title>
  </head>
  <body>
    
    <!-- Navbar -->
  <?php include 'menu.php'; ?>

  <div class="container">
    <h3>Halo! Berikut adalah riwayat pemesanan yang telah kamu lakukan.</h3>

    <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Jenis Jasa</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
            
                <?php 

                    $id_pemesan = $_SESSION["user"]['id_user'];
                    $ambil=$koneksi->query("SELECT * FROM pemesanan WHERE id_user = '$id_pemesan'");?>
                <?php while($pecah = $ambil->fetch_assoc()){; ?>
                <tr>
                    <td><?php echo $pecah['tanggal_pemesanan']; ?></td>
                    <td><?php echo $pecah['jenis_jasa']; ?></td>
                    <td>
                        <a href="nota.php?id=<?php echo $pecah['id_pemesanan'];?>" class="btn btn-primary">Detail</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

