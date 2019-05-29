<h2>Tambah Data Brand</h2>

<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Brand</label>
		<input type="text" class="form-control" name="nama" placeholder="Nama Brand">
	</div>
	<div class="form-group">
		<label>Foto Produk</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<button class="btn btn-primary" name="save">Simpan Data</button>
	<input type="reset" class="btn btn-danger" value="Reset">
</form>
<?php
if (isset($_POST["save"])) {
	$nama = $_FILES["foto"]["name"];
	$lokasi = $_FILES["foto"]["tmp_name"];
	move_uploaded_file($lokasi, "../img/$nama");
	$conn -> query("INSERT INTO brand(nama_brand,foto_brand) VALUES('$_POST[nama]','$nama')");
	echo "<script>alert('Brand Berhasil Ditambah');</script>";
	echo "<script>location='index.php?halaman=brand';</script>";
}
?>