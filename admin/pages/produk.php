<h2>Halaman Produk</h2>
<a href="index.php?halaman=tambahproduk" class="btn btn-primary">Tambah Data</a><br><br>
<div class="table-responsive">
	<table class="table table-bordered" id="dataTables-example">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Kategory Produk</th>
				<th>Produk Baru</th>
				<th>Harga</th>
				<th>Harga Diskon</th>
				<th>Berat</th>
				<th>Foto Produk</th>
				<th>Deskripsi</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; ?>
			<?php $rows = $conn->query("SELECT * FROM produk JOIN kategory_produk ON produk.kategory_id = kategory_produk.id_kategory ORDER BY id_produk DESC"); ?>
			<?php while($row = $rows->fetch_assoc()) { ?>
			<tr>
				<td><?= $no;; ?></td>
				<td><?= $row["nama_produk"]; ?></td>
				<td class="text-center"><?= $row["nama_kategory"]; ?></td>
				<td class="text-center"><?= $row["produk_baru"]; ?></td>
				<td><?= number_format($row["harga_produk"]); ?></td>
				<td><?= number_format($row["harga_produk_diskon"]); ?></td>
				<td><?= $row["berat_produk"]; ?> Gr</td>
				<td><img src="../img/<?= $row["foto_produk"]; ?>" width="100"></td>
				<td><?= $row["deskripsi_produk"]; ?></td>
				<td>
					<a href="index.php?halaman=ubahproduk&id=<?= $row["id_produk"]; ?>" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</a> <br><br>
					<a href="index.php?halaman=hapusproduk&id=<?= $row["id_produk"]; ?>" class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</a>
				</td>
			</tr>
			<?php $no++; ?>
			<?php } ?>
		</tbody>
	</table>
</div>