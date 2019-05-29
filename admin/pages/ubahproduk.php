<h2>Update Data Produk</h2>
<?php
$rows = $conn->query("SELECT * FROM produk JOIN kategory_produk ON produk.kategory_id=kategory_produk.id_kategory WHERE id_produk = '$_GET[id]'");
$row = $rows->fetch_assoc();
$query = $conn->query("SELECT * FROM kategory_produk");
?>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama" autocomplete="off" value="<?= $row["nama_produk"]; ?>">
	</div>
	<div class="form-group">
		<label>Produk baru</label>
		<select class="form-control" name="produk_baru">
			<option value="<?= $row["produk_baru"]; ?>"><?= $row["produk_baru"]; ?></option>
			<option value="ya">ya</option>
			<option value="tidak">tidak</option>
		</select>
	</div>
	<div class="form-group">
		<label>Kateory Produk</label>
		<select class="form-control" name="kategory">
			<option value="<?= $row["kategory_id"]; ?>"><?= $row["nama_kategory"]; ?></option>
			<?php while($row = $query->fetch_assoc()): ?>
			<option value="<?= $row["id_kategory"]; ?>"><?= $row["nama_kategory"]; ?></option>
			<?php endwhile; ?>
		</select>
	</div>
	<?php 
	$rows = $conn->query("SELECT * FROM produk JOIN kategory_produk ON produk.kategory_id=kategory_produk.id_kategory WHERE id_produk = '$_GET[id]'");
	$row = $rows->fetch_assoc();
	?>
	<div class="form-group">
		<label>Harga Produk (Rp)</label>
		<input type="number" class="form-control" name="harga" value="<?= $row["harga_produk"]; ?>">
	</div>
	<div class="form-group">
		<label>Harga Diskon (Rp)</label>
		<input type="number" class="form-control" name="diskon" value="<?= $row["harga_produk_diskon"]; ?>">
	</div>
	<div class="form-group">
		<label>Berat (Gr)</label>
		<input type="number" class="form-control" name="berat" value="<?= $row["berat_produk"]; ?>">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="ckeditor" name="deskripsi" rows="10"><?= $row["deskripsi_produk"]; ?></textarea>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<button class="btn btn-primary" name="ubah">Ubah Data</button>
	<input type="reset" class="btn btn-danger" value="Reset">
</form>
<?php
if (isset($_POST['ubah'])) {
	$namafoto = $_FILES['foto']['name'];
	$lokasifoto = $_FILES['foto']['tmp_name'];
	$deskripsi = $_POST["deskripsi"];
	if (!empty($lokasifoto)) {
		move_uploaded_file($lokasifoto, "../img/$namafoto");
		$conn->query("UPDATE produk SET
						produk_baru = '$_POST[produk_baru]',
						kategory_id = '$_POST[kategory]',
						nama_produk = '$_POST[nama]',
						harga_produk = '$_POST[harga]',
						harga_produk_diskon = '$_POST[diskon]',
						berat_produk = '$_POST[berat]',
						foto_produk = '$namafoto',
						deskripsi_produk = '$deskripsi'
						WHERE id_produk = '$_GET[id]'");
	}
	else
	{
		$conn->query("UPDATE produk SET
			produk_baru = '$_POST[produk_baru]',
			kategory_id = '$_POST[kategory]',
			nama_produk = '$_POST[nama]',
			harga_produk = '$_POST[harga]',
			harga_produk_diskon = '$_POST[diskon]',
			berat_produk = '$_POST[berat]',
			deskripsi_produk = '$deskripsi'
			WHERE id_produk = '$_GET[id]'");
	}
echo "<script>alert('Produk Berhasil Diubah');</script>";
echo "<script>location='index.php?halaman=produk';</script>";
}
?>