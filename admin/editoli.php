<?php
$koneksi = new mysqli("localhost", "root", "", "mservis");
?>

<?php
// Pastikan untuk menggunakan praktik keamanan seperti parameter terikat untuk menghindari serangan SQL injection
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_to_edit = $_POST['id_to_edit'];
    $nama_oli = $_POST['nama_oli'];
    $harga_oli = $_POST['harga_oli'];

    // Update data
    $koneksi->query("UPDATE oli SET nama_oli = '$nama_oli', harga_oli = '$harga_oli' WHERE id_oli = '$id_to_edit'");

    echo "<script>alert('Data Oli Berhasil Diubah')</script>";
    echo "<script>location='daftarharga.php';</script>";
}

$id_to_edit = $_GET['id'];

// Ambil data dari database
$query = $koneksi->query("SELECT * FROM oli WHERE id_oli = '$id_to_edit'");
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
        <title>Ubah Data Oli</title>
        <link rel="stylesheet" type="text/css" href="../css/checkout.css">
    </head>

    <body>
        <div class="wrapper-nota">
            <h1 style="text-align:center">Ubah Data Oli</h1>
            <br>
            <form action="" method="post">
                <div class="form">
                    <div class="inputfield">
                        <input type="hidden" name="id_to_edit" value="<?php echo $id_to_edit; ?>">
                        <label for="nama_oli">Nama Oli:</label>
                        <input type="text" name="nama_oli" class="input" value="<?php echo $pecah['nama_oli']; ?>">
                    </div>
                    <br>
                    <div class="inputfield">
                        <label for="harga_oli">Harga Oli:</label>
                        <input type="number" name="harga_oli" class="input" value="<?php echo $pecah['harga_oli']; ?>">
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