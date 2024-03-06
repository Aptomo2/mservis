<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "mservis");


$ambil = $koneksi->query("SELECT * FROM servis");

$ambil1 = $koneksi->query("SELECT * FROM cek");

$ambil2 = $koneksi->query("SELECT * FROM oli");

$ambil3 = $koneksi->query("SELECT * FROM sparepart");
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Admin</title>

    <style>
        @media print {
            .hide-on-print {
                display: none;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">Hallo Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="index.php">Daftar Jasa <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="daftarpemesanan.php">Daftar Pemesanan</a>
                    <a class="nav-item nav-link active" href="#">Daftar Harga</a>
                    <a class="nav-item nav-link" href="logoutadmin.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>


    <div class="container con-admin">

        <h2 class="hide-on-print"> Daftar Harga</h2>

        <form action="" method="GET" class="hide-on-print" style="text-align: right;">

            <button type="button" class="fa fa-print" style="background-color: lightgreen; height: 25px;"
                onclick="cetakPDF()"> Cetak</button>
        </form>

        <br>

        <table class="table table-bordered">
            <thead style="background-color: lightgray;">
                <tr>
                    <th style="width: 5%; text-align:center;">No</th>
                    <th style="width: 5%; text-align:center;">ID</th>
                    <th style="width: 40%;">Nama Servis</th>
                    <th style="width: 35%;">Harga</th>
                    <th style="width: 15%;" class="hide-on-print">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $nomor = 1; ?>
                <?php while ($pecah = $ambil->fetch_assoc()) {
                    ; ?>
                    <?php if (!empty($pecah['nama_servis'])) { ?>
                        <tr>
                            <td style="text-align:center">
                                <?php echo $nomor; ?>
                            </td>
                            <td style="text-align:center">
                                <?php echo $pecah['id_servis']; ?>
                            </td>
                            <td>
                                <?php echo $pecah['nama_servis']; ?>
                            </td>
                            <td>Rp.
                                <?php echo number_format($pecah['harga_servis'], 0, ',', '.'); ?>
                            </td>
                            <td class="hide-on-print">
                                <a href="editservis.php?id=<?php echo $pecah['id_servis']; ?>"
                                    class="btn btn-warning">Ubah</a>
                                <a href="hapusjasaservis.php?id=<?php echo $pecah['id_servis'] ?>"
                                    class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>

        <a href="tambahservis.php" class="btn btn-primary hide-on-print" style="margin-bottom: 15px">Tambah Data</a>

        <table class="table table-bordered">
            <thead style="background-color: lightgray;">
                <tr>
                    <th style="width: 5%; text-align:center;">No</th>
                    <th style="width: 5%; text-align:center;">ID</th>
                    <th style="width: 40%;">Nama Cek Kondisi</th>
                    <th style="width: 35%;">Harga</th>
                    <th style="width: 15%;" class="hide-on-print">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $nomor = 1; ?>
                <?php while ($pecah1 = $ambil1->fetch_assoc()) {
                    ; ?>
                    <?php if (!empty($pecah1['nama_cek'])) { ?>
                        <tr>
                            <td style="text-align:center">
                                <?php echo $nomor; ?>
                            </td>
                            <td style="text-align:center">
                                <?php echo $pecah1['id_cek']; ?>
                            </td>
                            <td>
                                <?php echo $pecah1['nama_cek']; ?>
                            </td>
                            <td>Rp.
                                <?php echo number_format($pecah1['harga_cek'], 0, ',', '.'); ?>
                            </td>
                            <td class="hide-on-print">
                                <a href="editcek.php?id=<?php echo $pecah1['id_cek']; ?>" class="btn btn-warning">Ubah</a>
                                <a href="#" class="btn btn-danger"
                                    onclick="confirmDelete('<?php echo $pecah1['id_cek']; ?>')">Hapus</a>
                            </td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>

        <a href="tambahcek.php" class="btn btn-primary hide-on-print" style="margin-bottom: 15px">Tambah Data</a>

        <table class="table table-bordered">
            <thead style="background-color: lightgray;">
                <tr>
                    <th style="width: 5%; text-align:center;">No</th>
                    <th style="width: 5%; text-align:center;">ID</th>
                    <th style="width: 40%;">Nama Oli</th>
                    <th style="width: 35%;">Harga</th>
                    <th style="width: 15%;" class="hide-on-print">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $nomor = 1; ?>
                <?php while ($pecah2 = $ambil2->fetch_assoc()) {
                    ; ?>
                    <?php if (!empty($pecah2['nama_oli'])) { ?>
                        <tr>
                            <td style="text-align:center">
                                <?php echo $nomor; ?>
                            </td>
                            <td style="text-align:center">
                                <?php echo $pecah2['id_oli']; ?>
                            </td>
                            <td>
                                <?php echo $pecah2['nama_oli']; ?>
                            </td>
                            <td>Rp.
                                <?php echo number_format($pecah2['harga_oli'], 0, ',', '.'); ?>
                            </td>
                            <td class="hide-on-print">
                                <a href="editoli.php?id=<?php echo $pecah2['id_oli']; ?>" class="btn btn-warning">Ubah</a>
                                <a href="hapusjasaoli.php?id=<?php echo $pecah2['id_oli'] ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>

        <a href="tambaholi.php" class="btn btn-primary hide-on-print" style="margin-bottom: 15px">Tambah Data</a>

        <table class="table table-bordered">
            <thead style="background-color: lightgray;">
                <tr>
                    <th style="width: 5%; text-align:center;">No</th>
                    <th style="width: 5%; text-align:center;">ID</th>
                    <th style="width: 40%;">Nama Sparepart</th>
                    <th style="width: 35%;">Harga</th>
                    <th style="width: 15%;" class="hide-on-print">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $nomor = 1; ?>
                <?php while ($pecah3 = $ambil3->fetch_assoc()) {
                    ; ?>
                    <?php if (!empty($pecah3['nama_sparepart'])) { ?>
                        <tr>
                            <td style="text-align:center">
                                <?php echo $nomor; ?>
                            </td>
                            <td style="text-align:center">
                                <?php echo $pecah3['id_sparepart']; ?>
                            </td>
                            <td>
                                <?php echo $pecah3['nama_sparepart']; ?>
                            </td>
                            <td>Rp.
                                <?php echo number_format($pecah3['harga_sparepart'], 0, ',', '.'); ?>
                            </td>
                            <td class="hide-on-print">
                                <a href="editspare.php?id=<?php echo $pecah3['id_sparepart']; ?>"
                                    class="btn btn-warning">Ubah</a>
                                <a href="hapusjasaspare.php?id=<?php echo $pecah3['id_sparepart'] ?>"
                                    class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>

        <a href="tambahspare.php" class="btn btn-primary hide-on-print" style="margin-bottom: 15px">Tambah Data</a>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script>
        function confirmDelete(namaCek) {
            var konfirmasi = confirm("Apakah Anda yakin ingin menghapus data dengan nama " + namaCek + "?");

            if (konfirmasi) {
                window.location.href = "hapusjasacek.php?id=" + namaCek;
            }
        }
        function cetakPDF() {
            // Hapus tombol cetak dari tampilan cetak
            var tombolCetak = document.querySelector('.btn-success');
            if (tombolCetak) {
                tombolCetak.style.display = 'none';
            }

            // Cetak halaman
            window.print();

            // Kembalikan tombol cetak setelah selesai mencetak
            if (tombolCetak) {
                tombolCetak.style.display = 'block';
            }
        }
    </script>
</body>

</html>