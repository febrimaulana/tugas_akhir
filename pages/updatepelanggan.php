<?php
if (!isset($_SESSION["pelanggan"])) {
echo "<script>alert('Login Terlebih Dahulu');</script>";
echo "<script>location='index.php?halaman=login';</script>";
}
?>
<div class="product-big-title-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="product-bit-title text-center">
					<?php $nama = $_SESSION["pelanggan"]["nama_pelanggan"] ?>
					<h2>Update Data <?= $nama; ?></h2>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="single-product-area">
	<div class="zigzag-bottom"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-8" style="margin-left: 15%">
				<div class="single-shop-product">
					<?php
					$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
					$email = $_SESSION["pelanggan"]["email_pelanggan"];
					$password = $_SESSION["pelanggan"]["password_pelanggan"];
					$nama = $_SESSION["pelanggan"]["nama_pelanggan"];
					$telepon = $_SESSION["pelanggan"]["telepon_pelanggan"];
					?>
					<form method="post">
						<div class="form-group">
							<label>Email :</label>
							<input type="email" class="form-control " name="email" disabled value="<?= $email; ?>">
						</div>
						<div class="form-group">
							<label>Password :</label>
							<input type="password" class="form-control" name="password" value="<?= $password; ?>">
						</div>
						<div class="form-group">
							<label>Nama :</label>
							<input type="text" class="form-control" name="nama" value="<?= $nama; ?>">
						</div>
						<div class="form-group">
							<label>Telepon :</label>
							<input type="number" class="form-control" name="telepon" value="<?= $telepon; ?>">
						</div>
						<button class="btn btn-primary" name="update">Update Data</button>
					</form>
					<?php
					if (isset($_POST["update"])) {
						$conn->query("UPDATE pelanggan SET
						password_pelanggan = '$_POST[password]',
						nama_pelanggan = '$_POST[nama]',
						telepon_pelanggan = '$_POST[telepon]'
						WHERE id_pelanggan = '$id_pelanggan'
						");
						echo "<script>alert('Data berhasil diupdate');</script>";
						echo "<script>location='index.php?halaman=detailakun';</script>";
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>