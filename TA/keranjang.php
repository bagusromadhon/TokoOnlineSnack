<?php 
session_start();
include 'koneksi.php';
if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
 {
	echo "<script>alert('keranjang telah kosong , silahkan belanja dulu');</script>";
	echo "<script>location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>keranjang</title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	<link rel="stylesheet" type="text/css" href="stylenav.css">
	<script src="https://kit.fontawesome.com/f1fba031da.js" crossorigin="anonymous"></script>
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,300&display=swap');
		header .logo{
			color: #333;
			margin-left: -50px;
		}
		header{
			box-shadow: 0 5px 20px rgba(0,0,0,0.5);
}
		 *{
   			 font-family: 'Poppins', sans-serif;
 		 }
	</style>
</head>
<body>





	<header>

<div class="btn-group">
   <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="fas fa-user-circle fa-3x"></i></a>
  <div class="dropdown-menu">
    <!-- isi dropdown e  -->
    <?php if (isset($_SESSION["pelanggan"])): ?>
    <a class="dropdown-item" href="profile.php?id=<?php echo $_SESSION["pelanggan"]['id_pelanggan']; ?>">Profile</a>
  <a href="riwayat.php"onclick="toggleMenu();"class="dropdown-item"> riwayat</a>
      <?php else: ?>
        <a href="login.php"onclick="toggleMenu();" class="dropdown-item"> login</a>
    <?php endif ?>
    <a class="dropdown-item" href="register.php">Register</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="logout.php">Logout</a>
  </div>
</div>
		<!-- navbar biasa -->
		<a href="" class="logo">snack<span>.</span></a>
		<div class="menuToggle" onclick="toggleMenu();"></div>
		<ul class="navigation">
			<li><a href="../onelandign/index.php" onclick="toggleMenu();"> Home</a></li>
			<li><a href="index.php" onclick="toggleMenu();"> Belanja </a></li>
			<li><a href="keranjang.php"onclick="toggleMenu();"> keranjang</a></li>
			<li><a href="checkout.php"onclick="toggleMenu();"> checkout</a></li>
			
			
		</ul>
		
	</header>


		<section class="konten">
			<br><br><br>
			<div class="container">
				<h1>keranjang belanja </h1>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>no</th>
							<th>produk</th>
							<th>harga</th>
							<th>jumlah</th>
							<th>subharga</th>
							<td>aksi</td>
						</tr>
					</thead>
					<tbody>
						<?php $nomor=1;?>
						<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah):?>
					<!-- menampilkan produk seng di perulangan o karo for each berdasarkan $id_produk seng entok teko a href beli -->
					<?php 
					$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
					while ($pecah = $ambil->fetch_assoc()){;
					?>
					<?php
					 
					// echo "<prev>";
					// print_r($pecah);
					// echo "</prev>";
					?>
						<tr>
							<td><?php echo $nomor;?></td>
							<td><?php echo $pecah['nama_produk'];?></td>
							<td><?php echo number_format($pecah['harga_produk']);?></td>
							<td><?php echo  $jumlah;?></td>
							<td><?php echo number_format($jumlah*$pecah['harga_produk']);?></td>
							<td>
								<a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger">Hapus</a>
							</td>

						</tr>
						<?php $nomor++;?>
					<?php } ?>
					<?php endforeach; ?>
					</tbody>
				</table>
				<a href="index.php" class="btn btn-primary">lanjutkan berbelanja </a>
				<a href="checkout.php" class="btn btn-warning">checkout</a>
			</div>
			
		</section>

		<script type="text/javascript">
		window.addEventListener('scroll',function(){
			const header = document.querySelector('header');
			header.classList.toggle("sticky",window.scrollY > 0);

		});
	</script>
	 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>