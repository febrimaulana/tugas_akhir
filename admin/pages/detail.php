<h2>Halaman Pembelian</h2>
<?php $result = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan WHERE pembelian.id_pembelian = '$_GET[id]'"); 
$detail = $result->fetch_assoc();
?>
<strong><?= $detail["nama_pelanggan"]; ?></strong> <br>
<p>
	<?= $detail["telepon_pelanggan"]; ?><br>
	<?= $detail["email_pelanggan"]; ?>
</p>
<p>
	Tanggal : <?= $detail["tanggal_pembelian"]; ?><br>
	Total : <?= $detail["total_pembelian"]; ?>
</p>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php $rows = $conn->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk = produk.id_produk WHERE pembelian_produk.id_pembelian = '$_GET[id]'"); ?>
		<?php while($row = $rows->fetch_assoc()) { ?>
		<tr>
			<td><?= $no; ?></td>
			<td><?= $row["nama_produk"]; ?></td>
			<td>Rp. <?= number_format($row["harga_produk_diskon"]); ?></td>
			<td><?= $row["jumlah"]; ?></td>
			<td><?= number_format($row["harga_produk_diskon"]*$row["jumlah"]); ?></td>
		</tr>
		<?php $no++; ?>
		<?php } ?>
	</tbody>
</table>