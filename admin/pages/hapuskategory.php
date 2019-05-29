<?php
$conn->query("DELETE FROM kategory_produk WHERE id_kategory = '$_GET[id]'");
echo "<script>alert('kategory Berhasil Hapus');</script>";
echo "<script>location='index.php?halaman=kategoryproduk';</script>";
?>