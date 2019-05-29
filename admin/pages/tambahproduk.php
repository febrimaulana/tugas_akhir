<h2>Tambah Produk</h2>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama" autofocus autocomplete="off">
	</div>
	<div class="form-group">
		<label>Kateory Produk</label>
		<select class="form-control" name="kategory">
			<?php $query = $conn->query("SELECT * FROM kategory_produk"); ?>
			<?php while($row = $query->fetch_assoc()) { ?>
			<option value="<?= $row["id_kategory"]; ?>"><?= $row["nama_kategory"]; ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label>Harga Produk (Rp)</label>
		<input type="number" class="form-control" name="harga">
	</div>
	<div class="form-group">
		<label>Harga Diskon (Rp)</label>
		<input type="number" class="form-control" name="diskon">
	</div>
	<div class="form-group">
		<label>Berat (Gr)</label>
		<input type="number" class="form-control" name="berat">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="ckeditor" name="deskripsi" rows="10"></textarea>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
	<input type="reset" class="btn btn-danger" value="Reset">
</form>
<?php
if (isset($_POST["save"]))
{
	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../img/".$nama);
	$conn -> query("INSERT INTO produk
		(kategory_id,nama_produk,harga_produk,harga_produk_diskon,berat_produk,foto_produk,deskripsi_produk)
		VALUES('$_POST[kategory]','$_POST[nama]','$_POST[harga]','$_POST[diskon]','$_POST[berat]','$nama','$_POST[deskripsi]')");
	echo "<script>alert('Produk Berhasil Ditambah');</script>";
	echo "<script>location='index.php?halaman=produk';</script>";
}
?>