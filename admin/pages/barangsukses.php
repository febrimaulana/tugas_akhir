<?php 
$id_pembelian = $_GET["id"];
$conn->query("UPDATE pembelian SET status_pembelian = 'Barang Sudah Sampai' WHERE id_pembelian = '$id_pembelian'");
echo "<script>alert('Data terupdate');</script>";
echo "<script>location='index.php';</script>";

?>