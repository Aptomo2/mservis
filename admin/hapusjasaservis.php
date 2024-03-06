<?php 
$koneksi = new mysqli("localhost","root","","mservis");
?>

<?php 

$koneksi->query("DELETE FROM servis WHERE id_servis = '$id'");

echo "<script>alert('Data Servis Berhasil Dihapus')</script>";
echo "<script>location='daftarharga.php';</script>"

?>