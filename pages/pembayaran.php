<?php
// jika tidak ada session pelanggan maka di larikan ke login.php
if (!isset($_SESSION["pelanggan"]) AND empty($_SESSION["pelanggan"])) {
echo "<script>alert('Silahkan Login terlebih dahulu');</script>";
echo "<script>location='index.php?halaman=login';</script>";
}

// get id_pembelian
$id_pembelian = $_GET["id"];
$query = $conn->query("SELECT * FROM pembelian WHERE id_pembelian = '$id_pembelian'");
$row = $query->fetch_assoc();
// amankan pembayaran
$idPelangganBeli = $row["id_pelanggan"];
$idPelangganLogin = $_SESSION["pelanggan"]["id_pelanggan"];
if ($idPelangganLogin !== $idPelangganBeli)
{
	echo "<script>alert('Pembelian Tidak Ada');</script>";
	echo "<script>location='index.php?halaman=riwayat';</script>";
}

// insert form ke data base
if (isset($_POST["kirim"])) {
	$namabukti = $_FILES["foto"]["name"];
	$lokasibukti = $_FILES["foto"]["tmp_name"];
	$namafix = date("YmdHis").$namabukti;
	move_uploaded_file($lokasibukti, "img_pembayaran/$namafix");

	$nama = $_POST["nama"];
	$bank = $_POST["bank"];
	$jumlah = $_POST["jumlah"];
	$tanggal = date("Y-m-d");

	// simpan data pembayaran
	$conn->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti)
					VALUES('$id_pembelian','$nama','$bank','$jumlah','$tanggal','$namafix')");
	// update data pembelian
	$conn->query("UPDATE pembelian SET status_pembelian = 'Sudah Kirim Pembayaran' WHERE id_pembelian = '$id_pembelian'");
	echo "<script>alert('Trimakasih Sudah Kirim Bukti Pembayaran');</script>";
	echo "<script>location='index.php?halaman=riwayat';</script>";

}
?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Kirim Bukti Pembayaran</h2>
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
                        <h2>Konfirmasi Pembayaran</h2>
                        <div class="alert alert-info">Total Tagihan Anda <strong>Rp. <?= number_format($row["total_pembelian"]); ?></strong></div>
                        <form action="" method="post" enctype="multipart/form-data">
                        	<div class="form-group">
                        		<label>Nama</label>
                        		<input type="text" class="form-control" name="nama" placeholder="Masukan Nama penyetor">
                        	</div>
                        	<div class="form-group">
                        		<label>Bank</label>
                        		<input type="text" class="form-control" name="bank" placeholder="Nama Bank">
                        	</div>
                        	<div class="form-group">
                        		<label>Jumlah</label>
                        		<input type="number" class="form-control" name="jumlah">
                        	</div>
                        	<div class="form-group">
                        		<label>Bukti Foto Pembayaran</label>
                        		<input type="file" class="form-control" name="foto">
                        		<p class="text-danger">Foto Bukti Maksimal 2MB</p>
                        	</div>
                        	<button class="btn btn-primary" name="kirim">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>