<?php 
$id_produk = $_GET["id"];
unset($_SESSION["keranjang"][$id_produk]);
echo "<script>alert('Produk dihapus dari keranjang belanja');</script>";
echo "<script>location='index.php?halaman=keranjang';</script>";

?>