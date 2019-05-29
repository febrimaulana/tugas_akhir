<h2>Halaman Kategory Produk</h2>
<a href="index.php?halaman=tambahkategory" class="btn btn-success">Tambah Data</a><br><br>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Kategory</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php $query = $conn->query("SELECT * FROM kategory_produk"); ?>
			<?php while($row = $query->fetch_assoc()){ ?>
		<tr>
			<td><?= $no; ?></td>
			<td><?= $row["nama_kategory"]; ?></td>
			<td>
				<a href="index.php?halaman=ubahkategory&id=<?= $row["id_kategory"]; ?>" class="btn btn-primary">Update</a>
				<a href="index.php?halaman=hapuskategory&id=<?= $row["id_kategory"]; ?>" class="btn btn-danger">Hapus</a>
			</td>
		</tr>
		<?php $no++; ?>
		<?php } ?>
	</tbody>
</table>