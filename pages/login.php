<div class="product-big-title-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="product-bit-title text-center">
					<h2>Login Pelanggan</h2>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row text-center ">
		<div class="col-md-12">
			<br /><br />
			<h2>Login Pelanggan</h2>
			<br />
		</div>
	</div>
	<div class="row ">
		<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>Masukan Username dan Password</strong>
				</div>
				<div class="panel-body">
					<form role="form" method="post">
						<br />
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
							<input type="text" class="form-control" placeholder="email" autofocus name="email" />
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
							<input type="password" class="form-control"  placeholder="Password" name="password" />
						</div>
						<button class="btn btn-primary" name="login">Login</button>
						<hr />
						Not register ? <a href="index.php?halaman=daftarakun" >click here </a>
					</form>
					<?php
					if (isset($_POST["login"])) {
						$email = $_POST["email"];
						$password = $_POST["password"];
						$rows = $conn->query("SELECT * FROM pelanggan WHERE email_pelanggan ='$email' AND password_pelanggan = '$password' AND aktif = '1'");
						// menghitung akun terambil
						$data = $rows->num_rows;
						if ($data==1)
						{
							$akun = $rows->fetch_assoc();
							$_SESSION["pelanggan"] = $akun;
							echo "<script>alert('Login Berhasil');</script>";
							if(isset($_SESSION["keranjang"]) AND !empty($_SESSION["keranjang"]))
							{
								echo "<script>location='index.php?halaman=checkout';</script>";
							}else{
								echo "<script>location='index.php';</script>";
							}
						}
						else
						{
							// login gagal
							echo "<script>alert('Login Gagal');</script>";
							echo "<script>location='index.php?halaman=login';</script>";
					}
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>