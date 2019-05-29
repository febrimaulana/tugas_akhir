<?php
include "admin/koneksi.php"; 
$conn->query("UPDATE pelanggan SET aktif = '1' WHERE code_confirm = '$_GET[code]'");
echo "<script>alert('Verivikasi Berhasil');</script>";
echo "<script>location='index.php?halaman=login';</script>";
?>