<?php 
//get id
$id_produk = $_GET['id'];

//jika sudah ada produk jumlah + 1
if (isset($_SESSION['keranjang'][$id_produk]))
{
	$_SESSION['keranjang'][$id_produk]+=1;
}
//selain itu produk belum ada di pilih 1
else
{
	$_SESSION['keranjang'][$id_produk] = 1;
}
// larikan ke halaman keranjang]
echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
echo "<script>location='index.php?halaman=keranjang';</script>";
?>