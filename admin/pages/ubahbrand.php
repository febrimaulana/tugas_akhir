<h2>Update Data Brand</h2>
<?php 
$rows = $conn->query("SELECT * FROM brand WHERE id_brand = '$_GET[id]'");
$row = $rows->fetch_assoc();
?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Brand :</label>
		<input type="text" class="form-control" name="nama" value="<?= $row["nama_brand"]; ?>">
	</div>
	<div class="form-group">
		<label>Ganti Foto Brand :</label><br>
		<img src="../img/<?= $row["foto_brand"]; ?>" width="200">
		<input type="file" class="form-control" name="foto">
	</div>
	<button class="btn btn-primary" name="ubah">Ubah Data</button>
	<input type="reset" class="btn btn-danger" value="Reset">
</form>
<?php 
if (isset($_POST['ubah'])) {
	$namafoto = $_FILES['foto']['name'];
	$lokasifoto = $_FILES['foto']['tmp_name'];
	if (!empty($lokasifoto)) {
		move_uploaded_file($lokasifoto, "../img/$namafoto");

		$conn->query("UPDATE brand SET
						nama_brand = '$_POST[nama]',
						foto_brand = '$namafoto'
						WHERE id_brand = '$_GET[id]'");
	}
	else
	{
		$conn->query("UPDATE brand SET nama_brand = '$_POST[nama]' WHERE id_brand = '$_GET[id]'");
	}
	echo "<script>alert('Brand Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=brand';</script>";
}
?>