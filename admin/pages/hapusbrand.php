<?php 
$conn->query("DELETE FROM brand WHERE id_brand = '$_GET[id]'");
echo "<script>alert('Brand Berhasil Hapus');</script>";
echo "<script>location='index.php?halaman=brand';</script>";
?>