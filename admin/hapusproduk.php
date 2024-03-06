<?php 
$koneksi = new mysqli("localhost","root","","mservis");
?>

<?php 
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotoproduk = $pecah['foto_produk'];

if (file_exists("fotoproduk/$fotoproduk"))
{
    unlink("fotoproduk/$fotoproduk");
}

$koneksi->query("DELETE FROM produk WHERE id_produk='$_GET[id]'");

echo "<script>alert('Produk Berhasil Dihapus')</script>";
echo "<script>location='index.php';</script>"

?>

