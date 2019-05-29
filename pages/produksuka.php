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
					<h2>Produk Favorit</h2>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
        	<?php $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"]; ?>
            <?php $rows = $conn->query("SELECT * FROM produk_pelanggan_suka JOIN produk ON produk_pelanggan_suka.id_produk = produk.id_produk WHERE id_pelanggan = '$id_pelanggan'"); ?>
            <?php
            $totaldata = $rows->num_rows;
            if ($totaldata == 0)
            {
            	echo "<script>alert('produk suka tidak ada, silahkan suka produk terlebih dahulu');</script>";
				echo "<script>location='index.php';</script>";
            }else{
            ?>
            	<?php while($row = $rows->fetch_assoc()){ ?>
	            <div class="col-md-3 col-sm-6">
	                <div class="single-shop-product">
	                    <div class="product-upper">
	                        <img src="img/<?= $row["foto_produk"]; ?>" style = "width: 195px; height: 243px">
	                    </div>
	                    <h2><a href="index.php?halaman=detail&id=<?= $row["id_produk"]; ?>"><?= $row["nama_produk"]; ?></a></h2>
	                    <div class="product-carousel-price">
	                        <ins>Rp. <?= number_format($row["harga_produk_diskon"]); ?></ins> <del>Rp. <?= number_format($row["harga_produk"]); ?></del>
	                    </div>
	                    
	                    <div class="product-option-shop">
	                        <a href="index.php?halaman=beli&id=<?= $row["id_produk"]; ?>" class="btn btn-primary">Add to cart</a>
	                    </div>
	                </div>
	            </div>
	            <?php } ?>
            <?php } ?>
            ?>
        </div>
    </div>
</div>