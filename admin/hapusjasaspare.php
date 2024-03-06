<?php 
$koneksi = new mysqli("localhost","root","","mservis");
?>

<?php 

$koneksi->query("DELETE FROM sparepart WHERE id_sparepart = '$id'");

echo "<script>alert('Data Sparepart Berhasil Dihapus')</script>";
echo "<script>location='daftarharga.php';</script>"

?>