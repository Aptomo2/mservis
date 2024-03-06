<?php
$koneksi = new mysqli("localhost", "root", "", "mservis");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Servis</title>
    <link rel="stylesheet" type="text/css" href="../css/checkout.css">
    <script>
        function showNotif() {
            alert("Data berhasil ditambahkan.");
            window.location.href = "daftarharga.php";
        }

        function showFail() {
            alert("Gagal menambahkan data");
            window.location.reload(); // Muat ulang halaman setelah alert jika gagal
        }
    </script>
</head>

<body>
    <div class="wrapper-nota">
        <h1 style="text-align:center">Tambah Data Servis</h1>
        <br>
        <form action="" method="post">
            <div class="form">
                <div class="inputfield">
                    <label for="nama_servis">Nama Servis:</label>
                    <input type="text" name="nama_servis" class="input" required>
                </div>
                <br>
                <div class="inputfield">
                    <label for="harga_servis">Harga Servis:</label>
                    <input type="number" name="harga_servis" class="input" required>
                </div>
                <br>
                <div class="inputfield">
                    <button type="submit" name="tambah" class="btn" style="margin-right: 10px;">Tambah Data</button>
                    <button type="button" onclick="window.location.href='daftarharga.php';" class="btn">Kembali</button>
                </div>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['tambah'])) {
        $nama = $_POST['nama_servis'];
        $harga = $_POST['harga_servis'];

        if ($koneksi->query("INSERT INTO servis (nama_servis,harga_servis) VALUES('$nama','$harga')")) {
            echo '<script>showNotif();</script>';
        } else {
            echo '<script>showFail();</script>';
        }
    }
    ?>
</body>

</html>