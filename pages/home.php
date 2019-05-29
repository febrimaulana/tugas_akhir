<div class="slider-area">
    <!-- Slider -->
    <div class="block-slider block-slider4">
        <ul class="" id="bxslider-home4">
            <li>
                <img src="img/h4-slide.png" alt="Slide">
                <div class="caption-group">
                    <h2 class="caption title">
                    Lihat<span class="primary"> Produk <strong>Iphone</strong></span>
                    </h2>
                    <h4 class="caption subtitle">Beli Sekarang</h4>
                    <a class="caption button-radius" href="index.php?halaman=hp"><span class="icon"></span>Shop now</a>
                </div>
            </li>
            <li><img src="img/banner2.jpg" alt="Slide">
                <div class="caption-group">
                    <h2 class="caption title" style="margin-left: 40%">
                    Produk <span class="primary">Hp <strong>Terbaru</strong></span>
                    </h2>
                    <h4 class="caption subtitle" style="margin-left: 40%">Lihat Produk</h4>
                    <a class="caption button-radius" href="index.php?halaman=hp" style="margin-left: 40%"><span class="icon"></span>Shop now</a>
                </div>
            </li>
            <li><img src="img/bannerbaju.jpg" alt="Slide">
                <div class="caption-group">
                    <h2 class="caption title">
                    by one, get one <span class="primary">50% <strong>off</strong></span>
                    </h2>
                    <h4 class="caption subtitle">Baju Pria & Wanita Kekinian.*</h4>
                    <a class="caption button-radius" href="index.php?halaman=baju pria"><span class="icon"></span>Shop now</a>
                </div>
            </li>
            <li><img src="img/laptop-banner.png" alt="Slide">
                <div class="caption-group">
                    <h2 class="caption title">
                    Produk <span class="primary">Laptop<br><strong>Harga Diskon</strong></span>
                    </h2>
                    <h4 class="caption subtitle">Beli Sekarang</h4>
                    <a class="caption button-radius" href="index.php?halaman=laptop"><span class="icon"></span>Shop now</a>
                </div>
            </li>
        </ul>
    </div>
    <!-- ./Slider -->
    </div> <!-- End slider area -->

    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>Garansi 12 hari</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Geratis Ongkir JABODETABEK</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Pembayaran Aman</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>Update Produk Baru</p>
                    </div>
                </div>
            </div>
        </div>
        </div> <!-- End promo area -->

        <div class="maincontent-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="latest-product">
                            <h2 class="section-title">Produk Terbaru</h2>
                            <div class="product-carousel">
                                <?php $rows = $conn->query("SELECT * FROM produk WHERE produk_baru = 'ya'"); ?>
                                <?php while($row = $rows->fetch_assoc()) { ?>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/<?= $row["foto_produk"]; ?>" style="width: 195px;height: 243px;">
                                        <div class="product-hover">
                                            <a href="index.php?halaman=beli&id=<?= $row["id_produk"]; ?>" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="index.php?halaman=detail&id=<?= $row["id_produk"]; ?>" class="view-details-link"><i class="fa fa-link"></i> Lihat detail</a>
                                        </div>
                                    </div>

                                    <h2><a href="index.php?detailbarang&id=<?= $row["id_produk"]; ?>"><?= $row["nama_produk"]; ?></a></h2>

                                    <div class="product-carousel-price">
                                        <ins>Rp. <?= number_format($row["harga_produk_diskon"]); ?></ins> <del>Rp. <?= number_format($row["harga_produk"]); ?></del>
                                    </div>
                                    <div>
                                        <a href="index.php?halaman=suka&id=<?= $row["id_produk"]; ?>" class="btn btn-danger">Suka</a>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div> <!-- End main content area -->

            <div class="brands-area">
                <div class="zigzag-bottom"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="brand-wrapper">
                                <div class="brand-list">
                                    <?php $rows = $conn->query("SELECT * FROM brand"); ?>
                                    <?php while($row = $rows->fetch_assoc()) { ?>
                                    <img src="img/<?= $row["foto_brand"]; ?>" style="width: 270px;height: 120px" >
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div> <!-- End brands area -->

                <div class="single-product-area">
                    <div class="zigzag-bottom"></div>
                    <div class="container">
                        <h2 class="section-title">Produk Terbaik</h2>
                        <div class="row">
                            <?php $rows = $conn->query("SELECT * FROM produk ORDER BY total_suka DESC LIMIT 8"); ?>
                            <?php while($row = $rows->fetch_assoc()) { ?>
                            <div class="col-md-3 col-sm-6">
                                <div class="single-shop-product">
                                    <div class="product-upper">
                                        <img src="img/<?= $row['foto_produk']; ?>" style = "width: 195px; height: 243px">
                                    </div>
                                    <h2><a href="index.php?halaman=detail&id=<?= $row["id_produk"]; ?>"><?= $row["nama_produk"]; ?></a></h2>
                                    <div class="product-carousel-price">
                                        <ins>Rp. <?= number_format($row["harga_produk_diskon"]); ?></ins> <del>Rp. <?= number_format($row["harga_produk"]); ?></del>
                                    </div>
                                    <div class="product-wid-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product-option-shop">
                                        <a href="index.php?halaman=beli&id=<?= $row["id_produk"]; ?>" class="btn btn-primary">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>