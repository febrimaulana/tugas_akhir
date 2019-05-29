<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['admin']))
{
    echo "<script>alert('Anda Harus Login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}
$query = $conn->query("SELECT * FROM admin");
$row = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php include "include/head.php"; ?>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">CMS Toko Febri</a>
                </div>
                <div style="color: white;
                    padding: 15px 50px 5px 50px;
                    float: right;
                    font-size: 16px;"> Terakhir Logout : <?= $row["terakhir_logout"]; ?> &nbsp; <a href="index.php?halaman=logout" class="btn btn-danger square-btn-adjust">Logout</a> </div>
                </nav>
                <?php include "include/navbar.php" ?>
                <div id="page-wrapper" >
                    <div id="page-inner">
                        <?php
                        if (isset($_GET['halaman']))
                        {
                            if ($_GET['halaman']=='produk')
                            {
                            include 'pages/produk.php';
                            }
                            elseif ($_GET['halaman']=='tambahproduk')
                            {
                                include "pages/tambahproduk.php";
                            }
                            elseif ($_GET['halaman']=='hapusproduk')
                            {
                                include "pages/hapusproduk.php";
                            }
                            elseif ($_GET['halaman']=='ubahproduk')
                            {
                                include "pages/ubahproduk.php";
                            }
                            elseif ($_GET['halaman']=='pembelian')
                            {
                                include 'pages/pembelian.php';
                            }
                            elseif ($_GET['halaman']=='pelanggan')
                            {
                                include 'pages/pelanggan.php';
                            }
                            elseif ($_GET['halaman']=='tambahpelanggan')
                            {
                                include 'pages/tambahpelanggan.php';
                            }
                            elseif ($_GET['halaman']=='hapuspelanggan')
                            {
                                include 'pages/hapuspelanggan.php';
                            }
                            elseif ($_GET['halaman']=='ubahpelanggan')
                            {
                                include 'pages/ubahpelanggan.php';
                            }
                            elseif ($_GET['halaman']=='detail')
                            {
                                include "pages/detail.php";
                            }
                            elseif ($_GET['halaman']=='brand')
                            {
                                include "pages/brand.php";
                            }
                            elseif ($_GET['halaman']=='tambahbrand')
                            {
                                include "pages/tambahbrand.php";
                            }
                            elseif ($_GET['halaman']=='hapusbrand')
                            {
                                include "pages/hapusbrand.php";
                            }
                            elseif ($_GET['halaman']=='ubahbrand')
                            {
                                include "pages/ubahbrand.php";
                            }
                            elseif ($_GET['halaman']=='logout')
                            {
                                include "pages/logout.php";
                            }
                            elseif ($_GET['halaman']=='prosesbarang')
                            {
                                include "pages/prosesbarang.php";
                            }
                            elseif ($_GET['halaman']=='barangsukses')
                            {
                                include "pages/barangsukses.php";
                            }
                             elseif ($_GET['halaman']=='ongkir')
                            {
                                include "pages/ongkir.php";
                            }
                             elseif ($_GET['halaman']=='pembayaran')
                            {
                                include "pages/pembayaran.php";
                            }
                            elseif ($_GET['halaman']=='tambahongkir')
                            {
                                include "pages/tambahongkir.php";
                            }
                            elseif ($_GET['halaman']=='ubahongkir')
                            {
                                include "pages/ubahongkir.php";
                            }
                            elseif ($_GET['halaman']=='hapusongkir')
                            {
                                include "pages/hapusongkir.php";
                            }
                            elseif ($_GET['halaman']=='kategoryproduk')
                            {
                                include "pages/kategoryproduk.php";
                            }
                            elseif ($_GET['halaman']=='tambahkategory')
                            {
                                include "pages/tambahkategory.php";
                            }
                            elseif ($_GET['halaman']=='ubahkategory')
                            {
                                include "pages/ubahkategory.php";
                            }
                            elseif ($_GET['halaman']=='hapuskategory')
                            {
                                include "pages/hapuskategory.php";
                            }

                        }
                        else
                        {
                        include 'pages/home.php';
                        }
                        ?>
                    </div>
                    <!-- /. PAGE INNER  -->
                </div>
                <!-- /. PAGE WRAPPER  -->
            </div>
            <?php include "include/script.php"; ?>
        </body>
    </html>