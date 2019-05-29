<?php
include "../koneksi.php";
include "../vendor/autoload.php";
$result = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan WHERE pembelian.id_pembelian = '$_GET[id]'");
$rows = $conn->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk = produk.id_produk WHERE pembelian_produk.id_pembelian = '$_GET[id]'");
$mpdf = new \Mpdf\Mpdf();
$html = 
$html .= '<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<link href="../assets/css/bootstrap.css" rel="stylesheet" />
	</head>
	<body>
		<h1 class="text-center">Nota Pembelian</h1><h3 class="text-center">Toko Febri</h3><br><hr>';
$detail = $result->fetch_assoc();
$html .= '<strong>'.$detail["nama_pelanggan"].'</strong>';
$html .= '<p>'.$detail["telepon_pelanggan"].'<br>'.$detail["email_pelanggan"].'</p>';
$html .= '<p> Tanggal : '.$detail["tanggal_pembelian"].'<br> Total : '.$detail["total_pembelian"].'</p>';
$html .= '<table class="table table-bordered">
				<tr>
					<th>No</th>
					<th>Nama Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Subtotal</th>
				</tr>';
				$no = 1;
				while($row = $rows->fetch_assoc()){
		$html .= '<tr>
					<td>'.$no.'</td>
					<td>'. $row["nama_produk"]. '</td>
					<td> Rp '. number_format($row["harga_produk_diskon"]). '</td>
					<td>'. $row["jumlah"]. '</td>
					<td>Rp '. number_format($row["harga_produk_diskon"]*$row["jumlah"]). '</td>
				</tr>';
				$no++;
			}
		$html .= '</table>
		</body>
	</html>';
$mpdf->WriteHTML($html);
$mpdf->Output();
?>