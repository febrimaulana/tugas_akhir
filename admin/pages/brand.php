<h2>Daftar Brand</h2>
<a href="index.php?halaman=tambahbrand" class="btn btn-primary">Tambah Data</a><br><br>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Brand</th>
			<th>Foto Brand</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php $rows = $conn->query("SELECT * FROM brand"); ?>
		<?php while($row = $rows->fetch_assoc()){ ?>
		<tr>
			<td><?= $no; ?></td>
			<td><?= $row["nama_brand"]; ?></td>
			<td><img src="../img/<?= $row["foto_brand"]; ?>" width="100"></td>
			<td>
				<a href="index.php?halaman=ubahbrand&id=<?= $row["id_brand"]; ?>" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</a>
				<a href="index.php?halaman=hapusbrand&id=<?= $row["id_brand"]; ?>" class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</a>
			</td>
		</tr>
		<?php $no++ ?>
		<?php } ?>
	</tbody>
</table>