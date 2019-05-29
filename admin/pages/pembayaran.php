<h2>Halaman Pembayaran</h2>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pembayaran</th>
			<th>Bank</th>
			<th>Jumlah</th>
			<th>Tanggal</th>
			<th>Foto Bukti Pembayaran</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; ?>
		<?php $query = $conn->query("SELECT * FROM pembayaran"); ?>
		<?php while($row = $query->fetch_assoc()) { ?>
		<tr>
			<td><?= $no; ?></td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["bank"]; ?></td>
			<td><?= $row["jumlah"]; ?></td>
			<td><?= $row["tanggal"]; ?></td>
			<td>
				<img src="../img_pembayaran/<?= $row["bukti"]; ?>" style="width: 200px;height: 250px">
			</td>
			<td><a href="index.php?halaman=detail&id=<?= $row["id_pembelian"]; ?>" class="btn btn-info">Detail</a></td>
			<?php $no++ ?>
			<?php } ?>
		</tr>
	</tbody>
</table>