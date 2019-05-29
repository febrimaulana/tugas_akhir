<?php 
if (empty($_SESSION["keranjang"]) AND !isset($_SESSION["kerajang"]))
{
    echo "<script>alert('Keranjang kosong, silahkan belanja dulu');</script>";
    echo "<script>location='index.php?halaman=shop';</script>";
}
?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Keranjang Belanja</h2>
                </div>
            </div>
        </div>
    </div>
    </div> <!-- End Page title area -->
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Produk Terbaik</h2>
                        <?php $rows = $conn->query("SELECT * FROM produk ORDER BY total_suka DESC LIMIT 4");?>
                        <?php while($row = $rows->fetch_assoc()) { ?>
                        <div class="thubmnail-recent">
                            <img src="img/<?= $row["foto_produk"]; ?>" class="recent-thumb" alt="">
                            <h2><a href="index.php?halaman=detail&id=<?= $row["id_produk"]; ?>"><?= $row["nama_produk"]; ?></a></h2>
                            <div class="product-sidebar-price">
                                <ins>Rp. <?= $row["harga_produk_diskon"]; ?></ins> <del>Rp. <?= $row["harga_produk"]; ?></del>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="post">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah):?>
                                        <!-- menampilkan produk -->
                                        <?php
                                        $rows = $conn->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
                                        $row = $rows->fetch_assoc();
                                        ?>
                                        <tr class="cart_item">
                                            <td><?= $no; ?></td>
                                            <td class="product-thumbnail">
                                                <img width="145" height="145" class="shop_thumbnail" src="img/<?= $row["foto_produk"]; ?>">
                                            </td>
                                            <td><?= $row["nama_produk"]; ?></td>
                                            <td>Rp. <?php echo number_format($row["harga_produk_diskon"]); ?></td>
                                            <td><?= $jumlah; ?></td>
                                            <td><?php echo number_format($row["harga_produk_diskon"]*$jumlah); ?></td>
                                            <td>
                                                <a href="index.php?halaman=hapuskeranjang&id=<?= $id_produk; ?>" class="btn btn-danger btn-xs">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                                <a href="index.php?halaman=shop" class="btn btn-default">Lanjutkan Belanja</a>
                                <a href="index.php?halaman=checkout" class="btn btn-primary">Checkout</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>