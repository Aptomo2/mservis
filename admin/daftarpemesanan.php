<?php 
session_start();
$koneksi = new mysqli("localhost","root","","mservis");

$whereClause = '';

if (isset($_GET['bulan'])) {
    $bulan = $_GET['bulan'];
    if ($bulan != 'semua') {
        $whereClause = " WHERE MONTH(tanggal_pemesanan) = '$bulan'";
    }
}

$ambil = $koneksi->query("SELECT * FROM pemesanan" . $whereClause);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="index.php">Daftar Jasa <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link active" href="#">Daftar Pemesanan</a>
                  <a class="nav-item nav-link" href="daftarharga.php">Daftar Harga</a>
                <a class="nav-item nav-link" href="logoutadmin.php">Logout</a>
            </div>
        </div>
    </div>
    </nav>


    <div class="container con-admin">

    <h2 class="hide-on-print"> Daftar Pemesanan</h2>
    
    <form action="" method="GET" class="hide-on-print" style="text-align: right;">
            <label for="bulan">Filter Data:</label>
            <select name="bulan" id="bulan">
                <option value="semua">Semua</option>
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
                <!-- Tambahkan opsi bulan lainnya sesuai kebutuhan -->
            </select>
            <button type="submit" class="fa fa-sort" style="background-color: lightgrey; height: 25px;"> Filter</button>
            <button type="button" class="fa fa-print" style="background-color: lightgreen; height: 25px;" onclick="cetakPDF()"> Cetak</button>
        </form>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pemesan</th>
                    <th>ID</th>
                    <th>Tanggal</th>
                    <th>Jenis Jasa</th>
                    <th>Total Biaya</th>
                    <th class="hide-on-print">Aksi</th>
                    
                </tr>
            </thead>

            <tbody>
                <?php $nomor = 1;?>
                <?php while($pecah = $ambil->fetch_assoc()){; ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $pecah['nama_pemesan']; ?></td>
                    <td><?php echo $pecah['id_user']; ?></td>
                    <td><?php echo $pecah['tanggal_pemesanan']; ?></td>
                    <td><?php echo $pecah['jenis_jasa']; ?></td>
                    <td>Rp. <?php echo number_format($pecah['total_biaya'], 0, ',', '.'); ?></td>
                    <td class="hide-on-print">
                    <a href="totalbiaya.php?id=<?php echo $pecah['id_pemesanan'];?>" class="btn btn-warning">Ubah</a>
                    <a href="detail.php?id=<?php echo $pecah['id_pemesanan'];?>" class="btn btn-primary">Detail</a>
                    <a href="hapuspesanan.php?id=<?php echo $pecah['id_pemesanan'] ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php $nomor++;?>
                <?php } ?>
            </tbody>
        </table>

        </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
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