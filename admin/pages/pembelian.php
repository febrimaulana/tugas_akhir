<h2>Halaman Pembelian</h2>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>Tanggal</th>
			<th>Kota Pengiriman</th>
			<th>Alamat</th>
			<th>Tarif Pengiriman</th>
			<th>Total</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php $rows = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan"); ?>
		<?php while($row = $rows->fetch_assoc()) { ?>
		<tr>
			<td><?= $no; ?></td>
			<td><?= $row["nama_pelanggan"]; ?></td>
			<td><?= $row["tanggal_pembelian"]; ?></td>
			<td><?= $row["nama_kota"]; ?></td>
			<td><?= $row["alamat_pengiriman"]; ?></td>
			<td><?= $row["tarif"]; ?></td>
			<td><?= $row["total_pembelian"]; ?></td>
			<td><?= $row["status_pembelian"]; ?></td>
			<td>
				<a href="index.php?halaman=detail&id=<?= $row["id_pembelian"]; ?>" class="btn btn-info">Detail</a><br><br>
				<a href="pages/cetakpembelian.php?id=<?= $row["id_pembelian"]; ?>" class="btn btn-success" target="_blank">Cetak</a>
			</td>
		</tr>
		<?php $no++; ?>
		<?php } ?>
	</tbody>
</table>