<h2>Halaman Pelanggan</h2>
<a href="index.php?halaman=tambahpelanggan" class="btn btn-primary">Tambah Data</a><br><br>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>No</th>
			<th>Email</th>
			<th>Nama Pelanggan</th>
			<th>Telepon</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php $rows = $conn->query("SELECT * FROM pelanggan"); ?>
		<?php while($row = $rows->fetch_assoc()) { ?>
		<tr>
			<td><?= $no; ?></td>
			<td><?= $row["email_pelanggan"]; ?></td>
			<td><?= $row["nama_pelanggan"]; ?></td>
			<td><?= $row["telepon_pelanggan"]; ?></td>
			<td>
				<a href="index.php?halaman=ubahpelanggan&id=<?= $row["id_pelanggan"]; ?>" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</a>
				<a href="index.php?halaman=hapuspelanggan&id=<?= $row["id_pelanggan"]; ?>" class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</a>
			</td>
		</tr>
		<?php $no++; ?>
		<?php } ?>
	</tbody>
</table>