<?php 
$koneksi = new mysqli("localhost","root","","mservis");
?>

<?php 


$koneksi->query("DELETE FROM pemesanan WHERE id_pemesanan='$_GET[id]'");

echo "<script>alert('Pesanan Berhasil Dihapus')</script>";
echo "<script>location='daftarpemesanan.php';</script>"

?>