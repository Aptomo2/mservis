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

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Poppins:wght@300&display=swap" rel="stylesheet">  

    <!-- CSS -->
    <link rel="stylesheet" href="css/jasa.css">
    
    <title>Jasa</title>
  </head>
  <body>
 
  <!-- Navbar -->
  <?php include 'menu.php'; ?>

  <!-- Produk / Jasa -->

    <div class="container">

      <h2>Pilih Jasa Yang Ingin Dipesan</h2>

        <div class="row" style="margin:auto;">

          <?php $ambil=$koneksi->query("SELECT * FROM produk");?>
          <?php while($perproduk=$ambil->fetch_assoc()){;?>

            <div class="col md-3 item">

                  <div class="card" style="width: 18rem; margin-top:50px;">
                    <img class="card-img-top"  src="img/fotoproduk/<?php echo $perproduk['foto_produk'];?>" alt="Card image cap"> 
                    <div class="card-body">
                      <h5 class="card-title text-center"><?php echo $perproduk['nama_produk'];?></h5>
                      <p class="card-text"><?php echo $perproduk['deskripsi_produk'];?></p>
                      <br>
                      <a href="<?php echo isset($_SESSION['user']) ? 'checkout.php?id=' . $perproduk['id_produk'] : 'login.php'; ?>"
                       class="btn btn-light center"><?php echo isset($_SESSION['user']) ? 'Pesan Sekarang' : 'Login untuk Pesan'; ?></a>
                    </div>
                  </div>
            </div>
          <?php } ?>



        </div>
          
        <div id="copyright">
          <div class="wrapper">
            &copy; 2023. <b>MServis</b> All Rights Reserved.
          </div>
        </div>
 

       
    </div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>