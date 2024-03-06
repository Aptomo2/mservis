<?php
session_start();
$id_pemesanan = $_GET['id'];
$koneksi = new mysqli("localhost","root","","mservis");
?>

<!DOCTYPE html>
<html>

<head>
   <title>Detail Pesanan</title>
   <link rel="stylesheet" type="text/css" href="css/detail.css">
</head>

<body>



   <?php
   $ambil_pemesanan = $koneksi->query("SELECT * FROM pemesanan WHERE id_pemesanan='$id_pemesanan'");
   $pecah_pemesanan = $ambil_pemesanan->fetch_assoc();
   $id_servis_pemesanan = $pecah_pemesanan['id_servis'];
   $id_cek_pemesanan = $pecah_pemesanan['id_cek'];
   $id_oli_pemesanan = $pecah_pemesanan['id_oli'];
   $id_spare_pemesanan = $pecah_pemesanan['id_sparepart'];

   $ambil_servis = $koneksi->query("SELECT * FROM servis WHERE id_servis='$id_servis_pemesanan'");
   $pecah_servis = $ambil_servis->fetch_assoc();

   $ambil_cek = $koneksi->query("SELECT * FROM cek WHERE id_cek='$id_cek_pemesanan'");
   $pecah_cek = $ambil_cek->fetch_assoc();

   $ambil_oli = $koneksi->query("SELECT * FROM oli WHERE id_oli='$id_oli_pemesanan'");
   $pecah_oli = $ambil_oli->fetch_assoc();

   $ambil_spare = $koneksi->query("SELECT * FROM sparepart WHERE id_sparepart='$id_spare_pemesanan'");
   $pecah_spare = $ambil_spare->fetch_assoc();
   ?>

   <div class="wrapper">
      <form method="post">
         <div class="title">
            <h2>
               <?php echo $pecah_pemesanan['jenis_jasa']; ?>
            </h2>
            <p>Tanggal Pemesanan :
               <?php echo $pecah_pemesanan['tanggal_pemesanan']; ?>
            </p>
            <p>Tanggal Kedatangan :
               <?php echo $pecah_pemesanan['tanggal_datang']; ?>
            </p>
         </div>
         <div class="form">
            <div class="inputfield">
               <label>Nama Pemesan</label>
               <input type="text" class="input" readonly value="<?php echo $pecah_pemesanan['nama_pemesan']; ?>">
            </div>

            <div class="inputfield">
               <label>Nomor Telepon</label>
               <input type="number" class="input" readonly value="<?php echo $pecah_pemesanan['telepon_pemesan']; ?>">
            </div>

            <div class="inputfield">
               <label>Alamat</label>
               <textarea class="textarea" readonly><?php echo $pecah_pemesanan['alamat_pemesan']; ?></textarea>
            </div>

            <div class="inputfield">
               <label>Servis</label>
               <input type="text" class="input" readonly
                  value="<?php echo $pecah_servis['nama_servis'] == NULL ? '-' : $pecah_servis['nama_servis'] . ' - Rp. ' . number_format($pecah_servis['harga_servis'], 0, ',', '.'); ?>">
            </div>

            <div class="inputfield">
               <label>Cek Kondisi</label>
               <input type="text" class="input" readonly
                  value="<?php echo $pecah_cek['nama_cek'] == NULL ? '-' : $pecah_cek['nama_cek'] . ' - Rp. ' . number_format($pecah_cek['harga_cek'], 0, ',', '.'); ?>">
            </div>

            <div class="inputfield">
               <label>Oli</label>
               <input type="text" class="input" readonly
                  value="<?php echo $pecah_oli['nama_oli'] == NULL ? '-' : $pecah_oli['nama_oli'] . ' - Rp. ' . number_format($pecah_oli['harga_oli'], 0, ',', '.'); ?>">
            </div>

            <div class="inputfield">
               <label>Sparepart</label>
               <input type="text" class="input" readonly
                  value="<?php echo $pecah_spare['nama_sparepart'] == NULL ? '-' : $pecah_spare['nama_sparepart'] . ' - Rp. ' . number_format($pecah_spare['harga_sparepart'], 0, ',', '.'); ?>">
            </div>

            <div class="inputfield">
               <label>Biaya Jasa</label>
               <?php
               $total_biaya_jasa = $pecah_servis['harga_servis'] + $pecah_cek['harga_cek'] + $pecah_oli['harga_oli'] + $pecah_spare['harga_sparepart'];
               ?>
               <input type="text" class="input" name="biayajasa" readonly
                  value="Rp. <?php echo number_format($total_biaya_jasa, 0, ',', '.'); ?>">
            </div>

            <div class="inputfield">
               <label>Biaya Tambahan</label>
               <input type="text" class="input" name="biayatambahan" readonly
                  value="Rp. <?php echo $pecah_pemesanan['biaya_tambahan']; ?>">
            </div>

            <div class="inputfield">
               <label>Keterangan Biaya Tambahan</label>
               <textarea type="text" class="textarea" readonly><?php echo $pecah_pemesanan['keterangan']; ?> </textarea>
            </div>

            <div class="inputfield">
               <label>Total Biaya</label>
               <input type="text" readonly value="Rp. <?php echo $pecah_pemesanan['total_biaya']; ?>" class="input">
            </div>
            <div class="btn" href="daftarpemesanan.php">
               <a href="daftarpemesanan.php">Kembali</a>
            </div>
         </div>
      </form>
   </div>

</body>

</html>