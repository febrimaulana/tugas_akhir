<div class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="user-menu">
                            <ul>
                                <li><a href="index.php?halaman=detailakun"><i class="fa fa-user"></i> My Account</a></li>
                                <?php if(isset($_SESSION["pelanggan"])) : ?>
                                <li><?= $_SESSION["pelanggan"]["nama_pelanggan"]; ?></li>
                                <li><a href="index.php?halaman=produksuka"><i class="fa fa-heart"></i> Produk Favorit</a></li>
                                <?php else: ?>
                                <li><a href="index.php?halaman=daftarakun"><i class="fa fa-user"></i> Daftar Pelanggan</a></li>
                                <?php endif ?>
                                <!-- jika sudah login (ada session pelanggan) -->
                                <?php if(isset($_SESSION["pelanggan"])): ?>
                                    <li><a href="index.php?halaman=logout"><i class="fa fa-user"></i> Logout</a></li>
                                <!-- jika belum login -->
                                <?php else: ?>
                                    <li><a href="index.php?halaman=login"><i class="fa fa-user"></i> Login</a></li>
                                <?php endif ?>                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            </div> <!-- End header area -->
            <?php if(isset($_SESSION["keranjang"])) { ?>
            <div class="site-branding-area">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="logo">
                                <h1><a href="index.php"><img src="img/logo2.png" style="width: 176px;height: 120px"></a></h1>
                            </div>
                        </div>
                        <?php $data = count($_SESSION["keranjang"]); ?>
                        <div class="col-sm-6">
                            <div class="shopping-item">
                                <a href="index.php?halaman=keranjang">Cart<span class="cart-amunt"></span> <i class="fa fa-shopping-cart"></i> <span class="product-count"><?= $data; ?></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }else{ ?>
                    <div class="site-branding-area">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="logo">
                                <h1><a href="index.php"><img src="img/logo2.png" style="width: 176px;height: 120px"></a></h1>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="shopping-item">
                                <a href="index.php?halaman=keranjang">Cart<span class="cart-amunt"></span> <i class="fa fa-shopping-cart"></i> <span class="product-count">0</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                `<?php } ?>
                </div> <!-- End site branding area -->

                <div class="mainmenu-area">
                    <div class="container">
                        <div class="row">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li><a href="index.php" class="nav-link">Home</a></li>
                                    <li><a href="index.php?halaman=shop" class="nav-link">Shop page</a></li>
                                    <li><a href="index.php?halaman=keranjang" class="nav-link">Keranjang Belanja</a></li>
                                    <?php if (!empty($_SESSION["keranjang"]) AND !isset($_SESSION["kerajang"])) { ?>
                                    <li><a href="index.php?halaman=checkout" class="nav-link">Checkout</a></li>
                                    <?php } ?>
                                    <?php if (isset($_SESSION["pelanggan"])) { ?>
                                        <li><a href="index.php?halaman=riwayat" class="nav-link">Riwayat Belanja</a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </div> <!-- End mainmenu area -->