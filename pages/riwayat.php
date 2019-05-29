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
                    <h2>Riwayat Pembelian</h2>
                </div>
            </div>
        </div>
    </div>
    </div> <!-- End Page title area -->
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8" style="margin-left: 20%">
                    <div class="single-shop-product">
                        <h2>Riwayat Belanja <?= $_SESSION["pelanggan"]["nama_pelanggan"]; ?></h2>

                        <table class="table table-bordered text-center">
                        	<thead>
                        		<tr>
                        			<th class="text-center">No</th>
                        			<th class="text-center">Tanggal</th>
                        			<th class="text-center">Status</th>
                        			<th class="text-center">Total</th>
                        			<th class="text-center">Opsi</th>
                        		</tr>
                        	</thead>
                        	<tbody>
                        		<?php 
                        		// get id
                        		$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
                        		$no = 1;
                        		$rows = $conn->query("SELECT * FROM pembelian WHERE id_pelanggan = '$id_pelanggan'");
                        		while($row = $rows->fetch_assoc()){
                        		?>
                        		<tr>
                        			<td><?= $no; ?></td>
                        			<td><?= $row["tanggal_pembelian"]; ?></td>
                        			<td><?= $row["status_pembelian"]; ?></td>
                        			<td>Rp. <?= number_format($row["total_pembelian"]); ?></td>
                        			<td>
                        				<a href="index.php?halaman=nota&id=<?= $row["id_pembelian"]; ?>" class="btn btn-primary">Nota</a>
                        				<a href="index.php?halaman=pembayaran&id=<?= $row["id_pembelian"]; ?>" class="btn btn-success">Pembayaran</a>
                        			</td>
                        		</tr>
                        		<?php $no++ ?>
                        		<?php } ?>
                        	</tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>