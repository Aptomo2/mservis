<?php
$koneksi = new mysqli("localhost", "root", "", "mservis");
?>

<?php
// Pastikan untuk menggunakan praktik keamanan seperti parameter terikat untuk menghindari serangan SQL injection
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_to_edit = $_POST['id_to_edit'];
    $nama_cek = $_POST['nama_cek'];
    $harga_cek = $_POST['harga_cek'];

    // Update data
    $koneksi->query("UPDATE cek SET nama_cek = '$nama_cek', harga_cek = '$harga_cek' WHERE id_cek = '$id_to_edit'");

    echo "<script>alert('Data Cek Kondisi Berhasil Diubah')</script>";
    echo "<script>location='daftarharga.php';</script>";
}

$id_to_edit = $_GET['id'];

// Ambil data dari database berdasarkan nama_cek
$query = $koneksi->query("SELECT * FROM cek WHERE id_cek = '$id_to_edit'");
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
        <title>Ubah Data Cek Kondisi</title>
        <link rel="stylesheet" type="text/css" href="../css/checkout.css">
    </head>

    <body>
        <div class="wrapper-nota">
            <h1 style="text-align:center">Ubah Data Cek Kondisi</h1>
            <br>
            <form action="" method="post">
                <div class="form">
                    <div class="inputfield">
                        <input type="hidden" name="id_to_edit" value="<?php echo $id_to_edit; ?>">
                        <label for="nama_cek">Nama Cek:</label>
                        <input type="text" name="nama_cek" class="input" value="<?php echo $pecah['nama_cek']; ?>">
                    </div>
                    <br>
                    <div class="inputfield">
                        <label for="harga_cek">Harga Cek:</label>
                        <input type="number" name="harga_cek" class="input" value="<?php echo $pecah['harga_cek']; ?>">
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