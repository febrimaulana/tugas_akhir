<?php
// jika tidak ada session pelanggan maka di larikan ke login.php
if (!isset($_SESSION["pelanggan"])) {
echo "<script>alert('Silahkan Login terlebih dahulu');</script>";
echo "<script>location='index.php?halaman=login';</script>";
}
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php $totalbelanja = 0; ?>
                                        <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah):?>
                                        <!-- menampilkan produk -->
                                        <?php
                                        $rows = $conn->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
                                        $row = $rows->fetch_assoc();
                                        $subharga = $row["harga_produk_diskon"]*$jumlah;
                                        ?>
                                        <tr class="cart_item">
                                            <td><?= $no; ?></td>
                                            <td class="product-thumbnail">
                                                <img width="145" height="145" class="shop_thumbnail" src="img/<?= $row["foto_produk"]; ?>">
                                            </td>
                                            <td><?= $row["nama_produk"]; ?></td>
                                            <td>Rp. <?php echo number_format($row["harga_produk_diskon"]); ?></td>
                                            <td><?= $jumlah; ?></td>
                                            <td><?php echo number_format($subharga); ?></td>
                                        </tr>
                                        <?php $no++; ?>
                                        <?php $totalbelanja += $subharga; ?>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total Belanja</th>
                                            <th>Rp. <?php echo number_format($totalbelanja); ?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <form method="post">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" readonly value="<?= $_SESSION["pelanggan"]["nama_pelanggan"]; ?>" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" readonly value="<?= $_SESSION["pelanggan"]["telepon_pelanggan"]; ?>" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <select class="form-control" name="id_ongkir" required>
                                                    <option value="">Pilih Ongkos Kirim</option>
                                                    <?php $rows = $conn->query("SELECT * FROM ongkir") ?>
                                                    <?php while($row = $rows->fetch_assoc()) { ?>
                                                    <option value="<?= $row["id_ongkir"]; ?>"><?= $row["nama_kota"]; ?> - <?= $row["status"]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Lengkap Pengiriman</label>
                                            <textarea class="form-control" name="alamat_pengiriman" placeholder="Masukan alamat lengkap pengiriman(termasuk kode pos)" required></textarea>
                                        </div>
                                        <button class=" btn btn-primary" name="checkout">Checkout</button>
                                    </div>
                                </form>
                                <?php
                                if(isset($_POST["checkout"]))
                                {
                                    $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
                                    $id_ongkir = $_POST["id_ongkir"];
                                    $tanggal_pembelian = date("Y-m-d");
                                    $alamat = $_POST["alamat_pengiriman"];
                                    $query = $conn->query("SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir'");
                                    $row = $query->fetch_assoc();
                                    $nama_kota = $row["nama_kota"];
                                    $tarif = $row["tarif"];

                                    $total_pembelian = $totalbelanja + $tarif;
                                    //simpan data ke database pembelian
                                    $conn->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman)
                                        VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat' )");

                                    //mendapatkan id_pembelian
                                    $id_pembelian_barusan = $conn->insert_id;

                                    foreach ($_SESSION["keranjang"] as $id_produk => $jumlah)
                                    {
                                        //mendaoatkan data produk berdasarkan id_produk
                                        $query = $conn->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
                                        $row = $query->fetch_assoc();
                                        $nama = $row["nama_produk"];
                                        $harga = $row["harga_produk_diskon"];
                                        $berat = $row["berat_produk"];
                                        $subberat = $row["berat_produk"]*$jumlah;
                                        $subharga = $row["harga_produk_diskon"]*$jumlah;
                                        $conn->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,berat,subberat,subharga,jumlah) VALUES ('$id_pembelian_barusan','$id_produk','$nama','$harga','$berat','$subberat','$subharga',$jumlah)");
                                    }
                                    //mengkosongkan keranjang
                                    unset($_SESSION["keranjang"]);
                                    // lompat ke halaman nota, nota pembelian barusan
                                    echo "<script>alert('pembelian Berhasil');</script>";
                                    echo "<script>location='index.php?halaman=nota&id=$id_pembelian_barusan';</script>";
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>