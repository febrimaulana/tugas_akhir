<?php $id_produk = $_GET["id"]; ?>
<div class="product-big-title-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="product-bit-title text-center">
					<h2>Detail Produk</h2>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="single-product-area">
	<div class="zigzag-bottom"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="single-sidebar">
					<h2 class="sidebar-title">Produk Terbaik</h2>
					<?php $rows = $conn->query("SELECT * FROM produk ORDER BY total_suka DESC LIMIT 4"); ?>
					<?php while($row = $rows->fetch_assoc()) { ?>
					<div class="thubmnail-recent">
						<img src="img/<?= $row["foto_produk"]; ?>" class="recent-thumb" alt="">
						<h2><a href="index.php?halaman=detail&id=<?= $row["id_produk"]; ?>"><?= $row["nama_produk"]; ?></a></h2>
						<div class="product-sidebar-price">
							<ins>Rp. <?php echo number_format($row["harga_produk_diskon"]); ?></ins> <del>Rp. <?php echo number_format($row["harga_produk"]); ?></del>
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="single-sidebar">
					<h2 class="sidebar-title">Produk Terbaru</h2>
					<ul>
						<?php $rows = $conn->query("SELECT * FROM produk WHERE produk_baru = 'ya'"); ?>
						<?php while($row = $rows->fetch_assoc()) { ?>
						<li><a href="index.php?halaman=detail&id=<?= $row["id_produk"]; ?>"><?= $row["nama_produk"]; ?></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<?php $rows = $conn->query("SELECT * FROM produk JOIN kategory_produk ON produk.kategory_id = kategory_produk.id_kategory WHERE id_produk = '$_GET[id]'"); ?>
			<?php $row = $rows->fetch_assoc(); ?>
			<div class="col-md-8">
				<div class="product-content-right">
					<div class="product-breadcroumb">
						<a href="index.php">Home</a>
						<a href="index.php?halaman=<?= $row["kategory_id"]; ?>"><?= $row["nama_kategory"]; ?></a>
						<b style="color: blue;"><?= $row["nama_produk"]; ?></b>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="product-images">
								<div class="product-main-img">
									<img src="img/<?= $row["foto_produk"]; ?>" style="width: 195px;height: 243px">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="product-inner">
								<h2 class="product-name"><?= $row["nama_produk"]; ?></h2>
								<div class="product-inner-price">
									<ins>Rp. <?php echo number_format($row["harga_produk_diskon"]); ?></ins> <del>Rp. <?php echo number_format($row["harga_produk"]); ?></del>
								</div>
								<form action="" method="post" class="cart">
									<div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="jumlah" min="1" step="1">
                                    </div>
									<button class="btn btn-primary" name="beli">Add to cart</button>
								</form>
								<?php 
								if (isset($_POST["beli"])) {
									$jumlah = $_POST["jumlah"];
									$_SESSION["keranjang"][$id_produk] = $jumlah;
									echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
									echo "<script>location='index.php?halaman=keranjang';</script>";
								}
								?>
								<div class="product-inner-category">
									<p>Kategory: <a href=""><?= $row["nama_kategory"]; ?></a>
								</div>
								<div role="tabpanel">
									<ul class="product-tab" role="tablist">
										<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Keterangan Produk</a></li>
										<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Penilaian</a></li>
									</ul>
									<div class="tab-content">
										<div role="tabpanel" class="tab-pane fade in active" id="home">
											<h2>Keterangan Produk</h2>
											<p><?= $row["deskripsi_produk"]; ?></p>
										</div>
										<div role="tabpanel" class="tab-pane fade" id="profile">
											<h2>Reviews</h2>
											<div class="submit-review">
												<p><label for="name">Name</label> <input name="name" type="text"></p>
												<p><label for="email">Email</label> <input name="email" type="email"></p>
												<div class="rating-chooser">
													<p>Your rating</p>
													<div class="rating-wrap-post">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
												</div>
												<p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
												<p><input type="submit" value="Submit"></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="related-products-wrapper">
						<h2 class="related-products-title">Produk Terbaru</h2>
						<div class="related-products-carousel">
							<?php $rows = $conn->query("SELECT * FROM produk WHERE produk_baru = 'ya'"); ?>
							<?php while($row = $rows->fetch_assoc()){ ?>
							<div class="single-product">
								<div class="product-f-image">
									<img src="img/<?= $row["foto_produk"]; ?>" alt="">
									<div class="product-hover">
										<a href="index.php?halaman=beli&id=<?= $row["id_produk"]; ?>" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
										<a href="index.php?halaman=detail&id=<?= $row["id_produk"]; ?>" class="view-details-link"><i class="fa fa-link"></i>Detail Produk</a>
									</div>
								</div>
								<h2><a href="index.php?halaman=detail&id=<?= $row["id_produk"]; ?>"><?= $row["nama_produk"]; ?></a></h2>
								<div class="product-carousel-price">
									<ins>Rp. <?php echo number_format($row["harga_produk_diskon"]); ?></ins> <del>Rp. <?php echo number_format($row["harga_produk"]); ?></del>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="footer-bottom-area">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="copyright">
					<p>&copy; Febri Maulana Yunus. <strong>Dumet School</strong></p>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="footer-card-icon">
					<i class="fa fa-cc-discover"></i>
					<i class="fa fa-cc-mastercard"></i>
					<i class="fa fa-cc-paypal"></i>
					<i class="fa fa-cc-visa"></i>
				</div>
			</div>
		</div>
	</div>
</div>