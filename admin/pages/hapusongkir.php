<?php 
$conn->query("DELETE FROM ongkir WHERE id_ongkir = '$_GET[id]'");
echo "<script>alert('Data berhasil dihapus');</script>";
echo "<script>location='index.php?halaman=ongkir';</script>";
?>