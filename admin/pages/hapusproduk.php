<?php
$rows = $conn->query("SELECT * FROM produk WHERE id_produk = '$_GET[id]'");
$row = $rows->fetch_assoc();
$fotoproduk = $row["foto_produk"];
if (file_exists("../img/$fotoproduk")) {
	unlink("../img/$fotoproduk");
}
$conn->query("DELETE FROM produk WHERE id_produk = '$_GET[id]'");
echo "<script>alert('produk Berhasil Hapus');</script>";
echo "<script>location='index.php?halaman=produk';</script>";
?>