<h2>Update Data Ongkir</h2>
<?php 
//tampil query
$query = $conn->query("SELECT * FROM ongkir WHERE id_ongkir = '$_GET[id]'");
$row = $query->fetch_assoc();

// update data
if (isset($_POST["ubah"])) {
	$namakota = $_POST["namakota"];
	$tarif = $_POST["tarif"];
	$status = $_POST["status"];
	$conn->query("UPDATE ongkir SET nama_kota = '$namakota',tarif = '$tarif',status = '$status' WHERE id_ongkir = '$_GET[id]'");
	echo "<script>alert('Data berhasil diupdate');</script>";
	echo "<script>location='index.php?halaman=ongkir';</script>";
}
?>
<form action="" method="post">
	<div class="form-group">
		<label>Nama Kota</label>
		<input type="text" class="form-control" name="namakota" value="<?= $row["nama_kota"]; ?>">
	</div>
	<div class="form-group">
		<label>Tarif Ongkir</label>
		<input type="number" name="tarif" class="form-control" value="<?= $row["tarif"]; ?>">
	</div>
	<div class="form-group">
		<label>Status Ongkir</label>
		<input type="text" name="status" class="form-control" value="<?= $row["status"]; ?>">
	</div>
	<button class="btn btn-primary" name="ubah">Update Data</button>
</form>