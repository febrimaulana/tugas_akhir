<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Nota Pembelian</h2>
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
                        <h2>Nota Pembelian</h2>
                        <?php $result = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan WHERE pembelian.id_pembelian = '$_GET[id]'");
                        $detail = $result->fetch_assoc();
                        $idPelangganBeli = $detail["id_pelanggan"];
                        $idPelangganLogin = $_SESSION["pelanggan"]["id_pelanggan"];
                        if ($idPelangganBeli !== $idPelangganLogin)
                        {
                            echo "<script>alert('Nota Tidak ada');</script>";
                            echo "<script>location='index.php?halaman=riwayat';</script>";
                            exit();
                        }
                        ?>
                        
                        <p>
                            Tanggal : <?= $detail["tanggal_pembelian"]; ?><br>
                            Total : <?= $detail["total_pembelian"]; ?>
                        </p>
                        <div class="row">
                            <div class="col-md-4">
                                <h3>Pembelian</h3>
                                <strong>Np. Pembelian: <?= $detail["id_pembelian"]; ?></strong><br>
                                Tanggal: <?= $detail["tanggal_pembelian"]; ?><br>
                                Total: Rp. <?= number_format($detail["total_pembelian"]); ?>
                            </div>
                            <div class="col-md-4">
                                <h3>Pelanggan</h3>
                                <strong><?= $detail["nama_pelanggan"]; ?></strong> <br>
                                <p>
                                    <?= $detail["telepon_pelanggan"]; ?><br>
                                    <?= $detail["email_pelanggan"]; ?>
                                </p>
                            </div>
                            <div class="col-md-4">
                                <h3>Pengiriman</h3>
                                <strong><?= $detail["nama_kota"]; ?></strong><br>
                                Ongkos Kirim: Rp. <?= number_format($detail["tarif"]); ?><br>
                                Alamat: <?= $detail["alamat_pengiriman"]; ?>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Berat</th>
                                    <th>Jumlah</th>
                                    <th>Subberat</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php $rows = $conn->query("SELECT * FROM pembelian_produk WHERE id_pembelian = '$_GET[id]'"); ?>
                                <?php while($row = $rows->fetch_assoc()) { ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row["nama"]; ?></td>
                                    <td>Rp. <?= number_format($row["harga"]); ?></td>
                                    <td><?= $row["berat"]; ?> Gr.</td>
                                    <td><?= $row["jumlah"]; ?></td>
                                    <td><?= $row["subberat"]; ?>Gr.</td>
                                    <td>Rp. <?= number_format($row["subharga"]); ?></td>
                                </tr>
                                <?php $no++; ?>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="alert alert-info">
                                    <p>
                                        Silahkan melakukan pembayaran Rp. <?= number_format($detail["total_pembelian"]); ?> <br>
                                        <strong>BANK MANDIRI 132-001088-3276.<br>FEBRI MAULANA YUNUS</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>