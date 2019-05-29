<?php 
$query = $conn->query("SELECT * FROM kategory_produk WHERE id_kategory = '$_GET[id]'");
$row = $query->fetch_assoc();
?>
<h2>Update Data</h2>
<form action="" method="post">
	<div class="form-group">
		<label>Nama Kategory</label>
		<input type="text" class="form-control" name="nama" value="<?= $row["nama_kategory"]; ?>">
	</div>
	<button class="btn btn-primary" name="ubah">Update Data</button>
</form>
<?php
if (isset($_POST["ubah"])) {
	$nama = $_POST["nama"];
	$conn->query("UPDATE kategory_produk SET nama_kategory = '$nama' WHERE id_kategory = '$_GET[id]'");
	echo "<script>alert('Data berhasil Ubah');</script>";
	echo "<script>location='index.php?halaman=kategoryproduk';</script>";
}
?>