<?php
$id_produk = $_GET["id"];
$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];

//query
$query = $conn->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
$row = $query->fetch_assoc();
$datasuka = $row["total_suka"];
$datasukaklik = $datasuka + 1;
$cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM produk_pelanggan_suka WHERE id_pelanggan = '$id_pelanggan' AND id_produk = '$id_produk'"));
//Update data dan insert
if (!isset($_SESSION["pelanggan"])) {
	echo "<script>alert('Login Terlebih Dahulu');</script>";
	echo "<script>location='index.php?halaman=login';</script>";
}else{
	if ($cek > 0) {
		echo "<script>alert('Produk sudah anda suka, silahkan suka produk lain');</script>";
		echo "<script>location='index.php?halaman=shop';</script>";
	}else{
		$conn->query("UPDATE produk SET total_suka = '$datasukaklik' WHERE id_produk = '$id_produk'");
		$conn->query("INSERT INTO produk_pelanggan_suka(id_pelanggan,id_produk) VALUES('$id_pelanggan','$id_produk')");
		echo "<script>alert('Produk tersimpan ke produk favorit');</script>";
		echo "<script>location='index.php?halaman=shop';</script>";
	}
}
?>