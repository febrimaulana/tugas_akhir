<div class="product-big-title-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="product-bit-title text-center">
					<h2>Daftar Pelanggan</h2>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="single-product-area">
	<div class="zigzag-bottom"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-8" style="margin-left: 20%">
				<div class="single-shop-product">
					<form method="post">
						<div class="form-group">
							<label>Email :</label>
							<input type="email" class="form-control " name="email" placeholder="email">
						</div>
						<div class="form-group">
							<label>Password :</label>
							<input type="password" class="form-control" name="password" placeholder="password">
						</div>
						<div class="form-group">
							<label>Nama :</label>
							<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
						</div>
						<div class="form-group">
							<label>Telepon :</label>
							<input type="number" class="form-control" name="telepon" placeholder="Telepon">
						</div>
						<button class="btn btn-primary" name="save">Daftar</button>
					</form>
					<?php
					if (isset($_POST["save"]))
					{
						$cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pelanggan WHERE email_pelanggan = '$_POST[email]'"));
						if ($cek>0)
						{
							echo "<script>alert('Email sudah terpakai, gunakan email lain');</script>";
							echo "<script>location='index.php?halaman=daftarakun';</script>";
						}
						else
						{
							$mail = new PHPMailer;
							$mail->IsSMTP();
							$mail->SMTPSecure = 'ssl';
							$mail->Host = "smtp.gmail.com"; //host masing2 provider email
							$mail->SMTPDebug = 1;
							$mail->Port = 465;
							$mail->SMTPAuth = true;
							$mail->Username = "febriyunus@gmail.com"; //user email
							$mail->Password = "marali11"; //password email
							$mail->SetFrom("febriyunus@gmail.com","TOKO FEBRI"); //set email pengirim
							$mail->Subject = "Verifikasi Akun"; //subyek email
							$mail->AddAddress($_POST["email"],"nama email tujuan");
							//$link = echo "<a href='index.php'>link</a>"; //Link body 
							//tujuan email
							$confirm = sha1($_POST["email"]);
							$mail->MsgHTML("<a href='http://localhost/tugas_akhir/index.php?halaman=aktifakun&code=$confirm'>Klik Link ini untuk mengaktifkan akun anda</a>");
							if($mail->Send()) echo "Message has been sent";
							else echo "Failed to sending message";
							$conn->query("INSERT INTO pelanggan
							VALUES(
							'',
							'$_POST[email]',
							'$_POST[password]',
							'$confirm',
							'$_POST[nama]',
							'$_POST[telepon]',
							'0'
							)
							");
							echo "<script>alert('Anda Berhasil Mendaftar, Silahkan buka email untuk verifikasi');</script>";
							echo "<script>location='index.php?halaman=login';</script>";
						}
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>