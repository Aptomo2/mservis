<?php
$koneksi = new mysqli("localhost", "root", "", "mservis");
?>

<?php
// Pastikan untuk menggunakan praktik keamanan seperti parameter terikat untuk menghindari serangan SQL injection
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_to_edit = $_POST['id_to_edit'];
    $nama_servis = $_POST['nama_servis'];
    $harga_servis = $_POST['harga_servis'];

    // Update data
    $koneksi->query("UPDATE servis SET nama_servis = '$nama_servis', harga_servis = '$harga_servis' WHERE id_servis = '$id_to_edit'");

    echo "<script>alert('Data Servis Berhasil Diubah')</script>";
    echo "<script>location='daftarharga.php';</script>";
}

$id_to_edit = $_GET['id'];

// Ambil data dari database
$query = $koneksi->query("SELECT * FROM servis WHERE id_servis = '$id_to_edit'");
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
        <title>Ubah Data Servis</title>
        <link rel="stylesheet" type="text/css" href="../css/checkout.css">
    </head>

    <body>
        <div class="wrapper-nota">
            <h1 style="text-align:center">Ubah Data Servis</h1>
            <br>
            <form action="" method="post">
                <div class="form">
                    <div class="inputfield">
                        <input type="hidden" name="id_to_edit" value="<?php echo $id_to_edit; ?>">
                        <label for="nama_servis">Nama Servis:</label>
                        <input type="text" name="nama_servis" class="input" value="<?php echo $pecah['nama_servis']; ?>">
                    </div>
                    <br>
                    <div class="inputfield">
                        <label for="harga_servis">Harga Servis:</label>
                        <input type="number" name="harga_servis" class="input" value="<?php echo $pecah['harga_servis']; ?>">
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