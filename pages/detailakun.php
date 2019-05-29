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
					<h2>Detail Akun Pelanggan</h2>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="single-product-area">
	<div class="zigzag-bottom"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<div class="single-shop-product">
					<table class="table table-bordered" style="margin-left: 120%">
						<thead>
							<tr>
								<th>No</th>
								<th>Email</th>
								<th>Password</th>
								<th>Nama</th>
								<th>Telepon</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
							$rows = $conn->query("SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");
							$row = $rows->fetch_assoc();
							?>
							<tr>
								<td>1</td>
								<td><?= $row["email_pelanggan"]; ?></td>
								<td><?= $row["password_pelanggan"]; ?></td>
								<td><?= $row["nama_pelanggan"]; ?></td>
								<td><?= $row["telepon_pelanggan"]; ?></td>
								<td>
									<a href="index.php?halaman=updatepelanggan&id=<?= $id_pelanggan; ?>" class="btn btn-primary">Update Data</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>