<?php 
$koneksi = new mysqli("localhost","root","","mservis");
?>

<?php 

$koneksi->query("DELETE FROM cek WHERE id_cek = '$id'");

echo "<script>alert('Data Cek Kondisi Berhasil Dihapus')</script>";
echo "<script>location='daftarharga.php';</script>"

?>