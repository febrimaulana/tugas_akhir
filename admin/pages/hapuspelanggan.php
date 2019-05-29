<?php 
$conn->query("DELETE FROM pelanggan WHERE id_pelanggan ='$_GET[id]'");
echo "<script>alert('Pelanggan Berhasil Hapus');</script>";
echo "<script>location='index.php?halaman=pelanggan';</script>";
?>