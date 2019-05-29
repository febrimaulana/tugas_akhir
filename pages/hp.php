<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Produk Handphone</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mainmenu-area">
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <?php $query = $conn->query("SELECT * FROM kategory_produk"); ?>
            <?php while($row = $query->fetch_assoc()){ ?>
            <li><a href="index.php?halaman=<?= $row["id_kategory"]; ?>" class="nav-link"><?= $row["nama_kategory"]; ?></a></li>
            <?php } ?>
        </ul>
    </div>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <?php $rows = $conn->query("SELECT * FROM produk WHERE kategory_id = '1'"); ?>
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
                            <a href="index.php?halaman=suka&id=<?= $row["id_produk"]; ?>" class="btn btn-danger">Suka</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>