<?php 
$rows = $conn->query("SELECT * FROM pelanggan WHERE id_pelanggan ='$_GET[id]'");
$row = $rows->fetch_assoc();
?>
<pre><?php print_r($row); ?></pre>
<h2>Update Data Pelanggan</h2>
<form action="" method="post">
	<div class="form-group">
		<label>Emial :</label>
		<input type="email" class="form-control" name="email" value="<?= $row["email_pelanggan"]; ?>">
	</div>
	<div class="form-group">
		<label>Password :</label>
		<input type="password" class="form-control" name="password" value="<?= $row["password_pelanggan"]; ?>">
	</div>
	<div class="form-group">
		<label>Nama Pelanggan :</label>
		<input type="text" class="form-control" name="nama" value="<?= $row["nama_pelanggan"]; ?>">
	</div>
	<div class="form-group">
		<label>Telepon Pelanggan :</label>
		<input type="number" class="form-control" name="no" value="<?= $row["telepon_pelanggan"]; ?>">
	</div>
	<button class="btn btn-primary" name="ubah">Ubah Data</button>
</form>
<?php
if (isset($_POST["ubah"])) {
	$conn->query("UPDATE pelanggan SET
				email_pelanggan = '$_POST[email]',
				password_pelanggan = '$_POST[password]',
				nama_pelanggan = '$_POST[nama]',
				telepon_pelanggan = '$_POST[no]'
				WHERE id_pelanggan = '$_GET[id]'
			");
echo "<script>alert('pelanggan Berhasil Diubah');</script>";
echo "<script>location='index.php?halaman=pelanggan';</script>";
}
?>