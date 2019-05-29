<?php
session_start();
include "admin/koneksi.php";
include "phpmailer/classes/class.phpmailer.php";
?>
<!DOCTYPE html>
<html lang="en">
    <?php include "include/head.php"; ?>
    <body>
        <?php include "include/header.php"; ?>
        <?php
        if (isset($_GET['halaman']))
        {
        if ($_GET['halaman'] == 'shop')
        {
        include "pages/shop.php";
        }
        if ($_GET['halaman'] == 'page')
        {
        include "pages/shop.php";
        }
        if ($_GET['halaman'] == '1')
        {
        include "pages/hp.php";
        }
        if ($_GET['halaman'] == '2')
        {
        include "pages/laptop.php";
        }
        if ($_GET['halaman'] == '3')
        {
        include "pages/bajupria.php";
        }
        if ($_GET['halaman'] == '4')
        {
        include "pages/bajuwanita.php";
        }
        if ($_GET['halaman'] == 'keranjang')
        {
        include "pages/keranjang.php";
        }
        if ($_GET['halaman'] == 'hapuskeranjang')
        {
        include "pages/hapuskeranjang.php";
        }
        if ($_GET['halaman'] == 'checkout')
        {
        include "pages/checkout.php";
        }
        if ($_GET['halaman'] == 'beli')
        {
        include "pages/beli.php";
        }
        if ($_GET['halaman'] == 'detail')
        {
        include "pages/detail.php";
        }
        if ($_GET['halaman'] == 'login')
        {
        include "pages/login.php";
        }
        if ($_GET['halaman'] == 'logout')
        {
        include "pages/logout.php";
        }
        if ($_GET['halaman'] == 'detailakun')
        {
        include "pages/detailakun.php";
        }
        if ($_GET['halaman'] == 'updatepelanggan')
        {
        include "pages/updatepelanggan.php";
        }
        if ($_GET['halaman'] == 'daftarakun')
        {
        include "pages/daftarakun.php";
        }
        if ($_GET['halaman'] == 'nota')
        {
        include "pages/nota.php";
        }
        if ($_GET['halaman'] == 'riwayat')
        {
        include "pages/riwayat.php";
        }
        if ($_GET['halaman'] == 'pembayaran')
        {
        include "pages/pembayaran.php";
        }
        if ($_GET['halaman'] == 'suka')
        {
        include "pages/suka.php";
        }
        if ($_GET['halaman'] == 'produksuka')
        {
        include "pages/produksuka.php";
        }
        if ($_GET['halaman'] == 'aktifakun')
        {
        include "pages/aktifakun.php";
        }
        }
        else
        {
        include "pages/home.php";
        }
        ?>
        <?php
        include "include/footer.php";
        include "include/script.php";
        ?>
    </body>
</html>