<?php 
include 'koneksi.php';
?>
<?php session_start(); ?>
<?php 
// mendapatkan id teko url
$id_produk = $_GET["id"];

// query ambil data
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$pecah_produk = $ambil->fetch_assoc();

// echo "<prev>";
// print_r($pecah_produk);
// echo "</prev>";

?>
<!DOCTYPE html>
<html>
<head>
	<title>detail produk</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="stylenav.css">
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,300&display=swap');
		header .logo{
			color: #333;
		}
		header{
			box-shadow: 0 5px 20px rgba(0,0,0,0.5);
}
		}*{
   			 font-family: 'Poppins', sans-serif;
 		 }
	</style>
</head>
<body>

	<header>
		<a href="" class="logo">snack<span>.</span></a>
		<div class="menuToggle" onclick="toggleMenu();"></div>
		<ul class="navigation">
			<li><a href="../onelandign/index.php" onclick="toggleMenu();"> Home</a></li>
			<li><a href="index.php" onclick="toggleMenu();"> Belanja </a></li>
			<li><a href="keranjang.php"onclick="toggleMenu();"> keranjang</a></li>
			<li><a href="checkout.php"onclick="toggleMenu();"> checkout</a></li>
			<?php if (isset($_SESSION["pelanggan"])):?>
			<li><a href="logout.php"onclick="toggleMenu();"> logout</a></li>
			<li><a href="riwayat.php"onclick="toggleMenu();"> riwayat</a></li>
			<?php else: ?>
			<li><a href="login.php"onclick="toggleMenu();"> login</a></li>
			<?php endif?>
			
		</ul>
		
	</header>
<br><br>

	<section class="konten">
		<br><br><br>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
				<img src="foto_produk/<?php echo $pecah_produk["foto_produk"];?>" alt="" class="img-responsive">	
				</div>
				
				<div class="col-md-6">
					<strong><h2 ><?php echo $pecah_produk['nama_produk'];?></h2></strong>
					<h4>Rp.<?php echo number_format($pecah_produk['harga_produk']);?></h4>
					<h5 >Stock Produk : <?php echo $pecah_produk['stock_produk'];?></h5>
					
					<form method="POST">
					<div class="form-group">
						<div class="input-group">
							<input type="number" name="jumlah" min="1" class="form-control" max="<?php echo $pecah_produk['stock_produk']?>" required >
							<div class="input-group-btn">
								<button class="btn btn-primary" name="beli">beli</button>
								
							</div>
						</div>
					</div>	
					<?php 
					// echo "<pre>";
					// print_r($_SESSION);
					// echo "</pre>";
					//  ?>
					</form>
					<?php 
					if (isset($_POST["beli"])) 
					{
						
					// mendapatkan id produk yang di beli /url
						$jumlah = $_POST["jumlah"];
						// masukan di kernajang belanja / ndek file beli
						$_SESSION["keranjang"][$id_produk] = $jumlah;

						echo "<script>alert('produk telah masuk ke keranjang belanja ');</script>";
						echo "<script>location='keranjang.php';</script>";
					}
					?>
					<h3>Deskripsi produk :</h3>
					<p><?php echo $pecah_produk['deskripsi_produk'];?></p>
				</div>
			</div>
		</div>
	</section>
<script type="text/javascript">
		window.addEventListener('scroll',function(){
			const header = document.querySelector('header');
			header.classList.toggle("sticky",window.scrollY > 0);

		});
		
	</script>
</body>
</html>