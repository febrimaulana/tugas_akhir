<?php 
unset($_SESSION["admin"]);
date_default_timezone_set("Asia/Jakarta");
$tanggalLogout = date('\T\a\n\g\g\a\l : d - m - Y\, H : i : s');
$conn->query("UPDATE admin SET terakhir_logout = '$tanggalLogout'");
echo "<script>alert('Anda berhasil Logout');</script>";
echo "<script>location='login.php';</script>";
?>