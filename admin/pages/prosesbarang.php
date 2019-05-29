<?php 
$id_pembelian = $_GET["id"];
$conn->query("UPDATE pembelian SET status_pembelian = 'Barang Sedang Dikirim' WHERE id_pembelian = '$id_pembelian'");
echo "<script>alert('Barang Berhasil Diproses');</script>";
echo "<script>location='index.php';</script>";

?>