<h2>Halaman Tambah Ongkir</h2>
<?php 
if (isset($_POST["save"])) {
	$namakota = $_POST["namakota"];
	$tarif = $_POST["tarif"];
	$status = $_POST["status"];
	$conn->query("INSERT INTO ongkir VALUES('','$namakota','$tarif','$status')");
	echo "<script>alert('Data berhasil ditambah');</script>";
	echo "<script>location='index.php?halaman=ongkir';</script>";
}
?>
<form action="" method="post">
	<div class="form-group">
		<label>Nama Kota</label>
		<input type="text" class="form-control" name="namakota" required>
	</div>
	<div class="form-group">
		<label>Tarif Ongkir</label>
		<input type="number" name="tarif" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Status Ongkir</label>
		<input type="text" name="status" class="form-control" required>
	</div>
	<button class="btn btn-primary" name="save">Save</button>
</form>