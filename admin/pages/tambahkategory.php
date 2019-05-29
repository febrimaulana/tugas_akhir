<h2>Tambah Kategory Produk</h2>
<form action="" method="post">
	<div class="form-group">
		<label>Nama Kategory</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<button class="btn btn-primary" name="save">Tambah Data</button>
</form>
<?php
if (isset($_POST["save"])) {
	$nama = $_POST["nama"];
	$conn->query("INSERT INTO kategory_produk VALUES('','$nama')");
	echo "<script>alert('Data berhasil ditambah');</script>";
	echo "<script>location='index.php?halaman=kategoryproduk';</script>";
}
?>