<?php
$koneksi = new mysqli("localhost", "root", "", "mservis");
?>

<?php
// Pastikan untuk menggunakan praktik keamanan seperti parameter terikat untuk menghindari serangan SQL injection
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_to_edit = $_POST['id_to_edit'];
    $nama_sparepart = $_POST['nama_sparepart'];
    $harga_sparepart = $_POST['harga_sparepart'];

    // Update data
    $koneksi->query("UPDATE sparepart SET nama_sparepart = '$nama_sparepart', harga_sparepart = '$harga_sparepart' WHERE id_sparepart = '$id_to_edit'");

    echo "<script>alert('Data Sparepart Berhasil Diubah')</script>";
    echo "<script>location='daftarharga.php';</script>";
}

$id_to_edit = $_GET['id'];

// Ambil data dari database
$query = $koneksi->query("SELECT * FROM sparepart WHERE id_sparepart = '$id_to_edit'");
$pecah = $query->fetch_assoc();

// Cek apakah data ditemukan
if ($pecah) {
    // Form untuk mengubah data
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ubah Data Sparepart</title>
        <link rel="stylesheet" type="text/css" href="../css/checkout.css">
    </head>

    <body>
        <div class="wrapper-nota">
            <h1 style="text-align:center">Ubah Data Sparepart</h1>
            <br>
            <form action="" method="post">
                <div class="form">
                    <div class="inputfield">
                        <input type="hidden" name="id_to_edit" value="<?php echo $id_to_edit; ?>">
                        <label for="nama_sparepart">Nama Sparepart:</label>
                        <input type="text" name="nama_sparepart" class="input" value="<?php echo $pecah['nama_sparepart']; ?>">
                    </div>
                    <br>
                    <div class="inputfield">
                        <label for="harga_sparepart">Harga Sparepart:</label>
                        <input type="number" name="harga_sparepart" class="input" value="<?php echo $pecah['harga_sparepart']; ?>">
                    </div>
                    <br>
                    <div class="inputfield">
                        <button type="submit" class="btn">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </body>

    </html>
    <?php
} else {
    echo "Data tidak ditemukan.";
}
?>