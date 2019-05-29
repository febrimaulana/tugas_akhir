<h2>Halaman Ongkir</h2>
<a href="index.php?halaman=tambahongkir" class="btn btn-success">Tambah Data</a><br><br>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Kota</th>
			<th>Trif</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php $query = $conn->query("SELECT * FROM ongkir"); ?>
		<?php while($row = $query->fetch_assoc()){ ?>
		<tr>
			<td><?= $no; ?></td>
			<td><?= $row["nama_kota"]; ?></td>
			<td>Rp. <?= number_format($row["tarif"]); ?></td>
			<td><?= $row["status"]; ?></td>
			<td>
				<a href="index.php?halaman=ubahongkir&id=<?= $row["id_ongkir"]; ?>" class="btn btn-primary">Update</a>
				<a href="index.php?halaman=hapusongkir&id=<?= $row["id_ongkir"]; ?>" class="btn btn-danger">Hapus</a>
			</td>
		</tr>
		<?php $no++ ?>
		<?php } ?>
	</tbody>
</table>