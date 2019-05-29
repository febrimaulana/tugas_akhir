<?php
$dataBuktiPembayaran = $conn->query("SELECT * FROM pembelian WHERE status_pembelian = 'sudah kirim pembayaran'");
$rowBukti = $dataBuktiPembayaran->num_rows;
$dataProduk = $conn->query("SELECT * FROM produk");
$rowProduk = $dataProduk->num_rows;
$dataPembelian = $conn->query("SELECT * FROM pelanggan");
$rowPelanggan = $dataPembelian->num_rows;
$dataPending = $conn->query("SELECT * FROM pembelian WHERE status_pembelian = 'pending'");
$rowPending = $dataPending->num_rows;
?>
<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<h2>Admin Dashboard</h2>
			<h3>Selamat Datang <?= $_SESSION["admin"]["nama_lengkap"]; ?></h3>
		</div>
	</div>
	<!-- /. ROW  -->
	<hr />
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-6">
			<div class="panel panel-back noti-box">
				<span class="icon-box bg-color-red set-icon">
					<i class="fa fa-envelope-o"></i>
				</span>
				<div class="text-box" >
					<p class="main-text"><?= $rowBukti; ?> New</p><br>
					<p class="text-muted">Sudah Kirim Bukti</p>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-6">
			<div class="panel panel-back noti-box">
				<span class="icon-box bg-color-green set-icon">
					<i class="fa fa-bars"></i>
				</span>
				<div class="text-box" >
					<p class="main-text"><?= $rowProduk; ?> Produk</p>
					<p class="text-muted">Produk</p>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-6">
			<div class="panel panel-back noti-box">
				<span class="icon-box bg-color-blue set-icon">
					<i class="fa fa-bell-o"></i>
				</span>
				<div class="text-box" >
					<p class="main-text"><?= $rowPelanggan; ?> Akun</p><br>
					<p class="text-muted">Akun Pelanggan</p>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-6">
			<div class="panel panel-back noti-box">
				<span class="icon-box bg-color-brown set-icon">
					<i class="fa fa-rocket"></i>
				</span>
				<div class="text-box" >
					<p class="main-text"><?= $rowPending; ?><br>Order</p>
					<p class="text-muted">Pembayaran Pending</p>
				</div>
			</div>
		</div>
	</div>
	<!-- /. ROW  -->
	<hr />
	<form method="post">
		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
			<h2>Pembayaran Pending</h2>
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Tanggal Pembelian</th>
					<th>Total</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				<?php $rows = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan WHERE status_pembelian = 'pending'"); ?>
				<?php while($row = $rows->fetch_assoc()) { ?>
				<tr>
					<td><?= $no; ?></td>
					<td><?= $row["nama_pelanggan"]; ?></td>
					<td><?= $row["tanggal_pembelian"]; ?></td>
					<td>Rp. <?= number_format($row["total_pembelian"]); ?></td>
					<td><?= $row["status_pembelian"]; ?></td>
				</tr>
				<?php $no++ ?>
				<?php } ?>
			</tbody>
		</table>
		<table class="table table-bordered">
			<h2>Sudah Kirim Bukti Pembayaran</h2>
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Tanggal Pembayaran</th>
					<th>Total</th>
					<th>Status</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				<?php $rows = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan JOIN pembayaran ON pembelian.id_pembelian = pembayaran.id_pembelian WHERE status_pembelian = 'sudah kirim pembayaran'"); ?>
				<?php while($row = $rows->fetch_assoc()) { ?>
				<tr>
					<td><?= $no; ?></td>
					<td><?= $row["nama_pelanggan"]; ?></td>
					<td><?= $row["tanggal"]; ?></td>
					<td>Rp. <?= number_format($row["total_pembelian"]); ?></td>
					<td><?= $row["status_pembelian"]; ?></td>
					<td>
						<a href="index.php?halaman=prosesbarang&id=<?= $row["id_pembelian"]; ?>" class="btn btn-success">Proses Barang</a>
						<a href="index.php?halaman=detail&id=<?= $row["id_pembelian"]; ?>" class="btn btn-info">Detail</a>
					</td>
					<?php $no++ ?>
					<?php } ?>
				</tr>
			</tbody>
		</table>
		<table class="table table-bordered">
			<h2>Barang Sedang Dikirim</h2>
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Tanggal Pembelian</th>
					<th>Total</th>
					<th>Status</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				<?php $rows = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan WHERE status_pembelian = 'barang sedang dikirim'"); ?>
				<?php while($row = $rows->fetch_assoc()) { ?>
				<tr>
					<td><?= $no; ?></td>
					<td><?= $row["nama_pelanggan"]; ?></td>
					<td><?= $row["tanggal_pembelian"]; ?></td>
					<td>Rp. <?= number_format($row["total_pembelian"]); ?></td>
					<td><?= $row["status_pembelian"]; ?></td>
					<td>
						<a href="index.php?halaman=barangsukses&id=<?= $row["id_pembelian"]; ?>" class="btn btn-success">Barang Sudah Sampai</a>
					</td>
				</tr>
				<?php $no++ ?>
				<?php } ?>
			</tbody>
		</table>
	</form>
</div>