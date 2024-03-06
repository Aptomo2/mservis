<?php
session_start();
$id_produk = $_GET['id'];
include "setting/koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
  <title>Checkout</title>
  <link rel="stylesheet" type="text/css" href="css/checkout.css">
</head>

<body>

  <!-- Navbar -->
  <?php
  include 'menu.php';
  ?>

  <?php
  $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
  $pecah = $ambil->fetch_assoc();
  ?>

  <div class="wrapper-nota">
    <form method="post">
      <div class="title">
        <?php echo $pecah['nama_produk']; ?>
        <p>Tanggal Pemesanan :
          <?php echo $date = date('Y-m-d'); ?>
        </p>
      </div>

      <div class="form">
        <div class="inputfield">
          <label>Nama Pemesan</label>
          <input type="text" class="input" name="nama" value="<?php echo $_SESSION["user"]['nama_pemesan']; ?>">
        </div>

        <div class="inputfield">
          <label>Nomor Telepon</label>
          <input type="number" class="input" name="telepon" placeholder="Nomor Telepon">
        </div>

        <div class="inputfield">
          <label>Alamat</label>
          <textarea class="textarea" name="alamat" placeholder="Alamat"></textarea>
        </div>


        <div class="inputfield">
          <label>Servis</label>
          <label for="servis"></label>
          <select name="id_servis" id="servis" class="input" style="width: 940px">
            <option value="1"></option>
            <?php
            $result = $koneksi->query("SELECT * FROM servis");
            while ($row = $result->fetch_assoc()) {
              if ($row['nama_servis'] == NULL) {

              } else {
                echo "<option value='" . $row['id_servis'] . "'>" . ($row['nama_servis'] . " - Rp. " . number_format($row['harga_servis'], 0, ',', '.')) . "</option>";
              }
            }
            ?>
          </select>
        </div>

        <div class="inputfield">
          <label>Cek Kondisi</label>
          <label for="cek"></label>
          <select name="id_cek" id="cek" class="input" style="width: 940px">
            <option value="1"></option>
            <?php
            $result = $koneksi->query("SELECT * FROM cek");
            while ($row = $result->fetch_assoc()) {
              if ($row['nama_cek'] == NULL) {

              } else {
                echo "<option value='" . $row['id_cek'] . "'>" . ($row['nama_cek'] . " - Rp. " . number_format($row['harga_cek'], 0, ',', '.')) . "</option>";
              }
            }
            ?>
          </select>
        </div>

        <div class="inputfield">
          <label>Oli</label>
          <label for="oli"></label>
          <select name="id_oli" id="oli" class="input" style="width: 940px">
            <option value="1"></option>
            <?php
            $result = $koneksi->query("SELECT * FROM oli");
            while ($row = $result->fetch_assoc()) {
              if ($row['nama_oli'] == NULL) {

              } else {
                echo "<option value='" . $row['id_oli'] . "'>" . ($row['nama_oli'] . " - Rp. " . number_format($row['harga_oli'], 0, ',', '.')) . "</option>";
              }
            }
            ?>
          </select>
        </div>

        <div class="inputfield">
          <label>Sparepart</label>
          <label for="sparepart"></label>
          <select name="id_sparepart" id="sparepart" class="input" style="width: 940px">
            <option value="1"></option>
            <?php
            $result = $koneksi->query("SELECT * FROM sparepart");
            while ($row = $result->fetch_assoc()) {
              if ($row['nama_sparepart'] == NULL) {

              } else {
                echo "<option value='" . $row['id_sparepart'] . "'>" . ($row['nama_sparepart'] . " - Rp. " . number_format($row['harga_sparepart'], 0, ',', '.')) . "</option>";
              }
            }
            ?>
          </select>
        </div>


        <div class="inputfield">
          <label>Tanggal Kedatangan</label>
          <input type="date" class="input" name="tgl">
        </div>

        <div class="inputfield terms">
          <label class="check">
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <p>Setuju dengan S&K yang berlaku</p>
        </div>

        <div class="inputfield">
          <button type="submit" name="pesan" class="btn">Pesan Jasa</button>
        </div>
      </div>
    </form>
  </div>

  <?php
  if (isset($_POST["pesan"])) {
    $id_pemesan = $_SESSION["user"]["id_user"];
    $nama = $_SESSION["user"]["nama_pemesan"];
    $tanggal_pemesanan = date("Y-m-d");
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];
    $id_pemesanan_jasa = $koneksi->insert_id;
    $jenis_jasa = $pecah['nama_produk'];
    $tanggal_datang = $_POST['tgl'];
    $id_servis = $_POST['id_servis'];
    $id_cek = $_POST['id_cek'];
    $id_oli = $_POST['id_oli'];
    $id_sparepart = $_POST['id_sparepart'];

    $koneksi->query("INSERT INTO pemesanan (id_user, tanggal_pemesanan, nama_pemesan, jenis_jasa, telepon_pemesan, alamat_pemesan, tanggal_datang, id_servis, id_cek, id_oli, id_sparepart) VALUES ('$id_pemesan','$tanggal_pemesanan','$nama','$jenis_jasa','$telepon','$alamat','$tanggal_datang', '$id_servis', '$id_cek', '$id_oli', '$id_sparepart')");

    echo "<script>location='riwayatpemesanan.php';</script>";
  }

  ?>

</body>

</html>