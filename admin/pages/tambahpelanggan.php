<h2>Tambah Data Pelanggan</h2>
<form action="" method="post">
	<div class="form-group">
		<label>Emial :</label>
		<input type="email" class="form-control" name="email">
	</div>
	<div class="form-group">
		<label>Password :</label>
		<input type="password" class="form-control" name="password">
	</div>
	<div class="form-group">
		<label>Nama Pelanggan :</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Telepon Pelanggan :</label>
		<input type="number" class="form-control" name="no">
	</div>
	<button class="btn btn-primary" name="save">Simpan Data</button>
</form>
<?php 
if (isset($_POST["save"])) {
	$conn->query("INSERT INTO pelanggan(email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan)
					VALUES ('$_POST[email]','$_POST[password]','$_POST[nama]','$_POST[no]')");
	echo "<script>alert('Pelanggan Berhasil Ditambah');</script>";
	echo "<script>location='index.php?halaman=pelanggan';</script>";
}
?>