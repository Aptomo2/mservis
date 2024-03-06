<?php 
$koneksi = new mysqli("localhost","root","","mservis");
?>

<?php 

$koneksi->query("DELETE FROM oli WHERE id_oli = '$id'");

echo "<script>alert('Data Oli Berhasil Dihapus')</script>";
echo "<script>location='daftarharga.php';</script>"

?>