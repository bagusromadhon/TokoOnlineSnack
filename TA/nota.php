<?php 
include 'koneksi.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Nota pembelian </title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="stylenav.css">
    <script src="https://kit.fontawesome.com/f1fba031da.js" crossorigin="anonymous"></script>
		    <script src="https://kit.fontawesome.com/f1fba031da.js" crossorigin="anonymous"></script>
		    
	<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,300&display=swap');
		*{
    font-family: 'Poppins', sans-serif;
  }
		
		header .logo{
			color: #333;
		}
		header{
			box-shadow: 0 5px 20px rgba(0,0,0,0.5);
}
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
    <a class="dropdown-item" href="register.php">Register</a>
    <?php endif ?>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="logout.php">Logout</a>
  </div>
</div>

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
				<!-- nota copy an tekok admin -->
		<h2>Nota Pembelian</h2>
		<?php 
		$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
		$detail=$ambil->fetch_assoc();
		?>
		<!-- print r data  -->

		<!-- <h1>data orang yang beli $detail</h1> -->
		<!-- <pre><?php //print_r($detail);?></pre> -->

		<!-- <h1>data orang yang login di session</h1> -->
		<!-- <pre> <?php //print_r($_SESSION); ?></pre> -->

		<!-- jika pelanggan yang beli tidak sama dengan yang login maka di larikan di lainya gak berhak ndelok nota e uwong -->
		<!-- pelanggan seng tuku harus pelanggan seng login -->
		<?php  
		// mendapatkan id pelanggan yang beli
		$idpelanggansengtuku = $detail["id_pelanggan"];
		//mendapatkan id pelanggan yang login dari session
		$idpelanggansession = $_SESSION["pelanggan"]["id_pelanggan"];
		
		if ($idpelanggansengtuku!==$idpelanggansession) 
		{
			echo "<script>alert('Terditeksi Kecurangan Tidak dapat Masuk ke url ');</script>";
			echo "<script>location='riwayat.php';</script>";
		}
		?>
	
		<p>
			<i class="fas fa-calendar-check fa-3x"></i>
			tanggal: <?php echo $detail['tanggal_pembelian'];?> <br>
			total: <?php echo $detail['total_pembelian'];?>  + Ongkir <?php echo $detail['ongkir'] ?><br>
		</p>
			<div class="row">
				<div class="col-md-4">
					
					<i class="fab fa-shopify fa-3x"></i>
					<strong>No. Pembelian: <?php echo $detail['id_pembelian']; ?></strong><br>
					Tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>
					Total: Rp.<?php echo number_format($detail['total_pembelian']+$detail['ongkir']) ?>
				</div>

				<div class="col-md-4">
					<i class="fas fa-users fa-3x"></i>
						<strong><?php echo $detail['nama_pelanggan'];?></strong><br>

					<P>
						<?php echo $detail['telepon_pelanggan'];?> <br>
						<?php echo $detail['email_pelanggan'];?> <br>
					</P>
				</div>

				<div class="col-md-4">
					
					<i class="fas fa-truck fa-3x"></i>
					<strong><?php echo $detail['nama_kota']?></strong><br>
					Dari Kabupaten Malang Ke -> <?php echo $detail["provinsi"]?>-><?php echo $detail["tipe"]; ?> -><?php echo $detail["distrik"]; ?><br>
					<strong>Kode Pos</strong> : <?php echo $detail["kodepos"] ?> <br>
					<strong>Ekspedisi :</strong> <?php echo $detail["ekspedisi"] ?><br>
					<strong>Ongkos/Estimasi:</strong> <?php echo $detail["paket"] ?> - <?php echo $detail["ongkir"] ?> - <?php echo $detail["estimasi"] ?><br>
					<strong> Alamat : </strong> <?php echo $detail['alamat_pengiriman'];?>
				</div>

				
			</div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>no</th>
					<th>nama produk</th>
					<th>harga </th>
					<th>berat</th>
					<th>jumlah </th>
					<th>subberat</th>
					<th>subtotal</th>
					
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1;?>
				<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'");?>
				<?php while($pecah=$ambil->fetch_assoc()){?>

				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $pecah['nama'];?></td>
					<td>Rp.<?php echo number_format( $pecah['harga']);?></td>
					<td><?php echo $pecah['berat'];?></td>
					<td><?php echo $pecah['jumlah'];?></td>
					<td><?php echo $pecah ['subberat'];?></td>
					<td><?php echo number_format($pecah ['subharga']);?></td>
					
				</tr>
				<?php $nomor++?>
			<?php } ?>
			</tbody>
			<tfoot>
				<th colspan="6">Total Harga + Ongkir 
					<td><?php echo number_format($detail['total_pembelian']+$detail['ongkir']); ?></td>
					
				</th>
			</tfoot>
		</table>

<div class="row">
	<div class="col-md-7">
		<div class="alert alert-info">
			<p>
				Silahkan Melakukan Pembayaran Rp. <?php echo number_format($detail['total_pembelian']+$detail['ongkir']); ?> Ke <br>
				<strong>BANK SALAH SATU DI BAWHA INI <br>
				 - MANDIRI 098088-9823018239 AN. BAGUS ROMADHON<br>
				 - BRI 0982308123-218392138 AN. BAGUS ROMADHON <br>
				 - BNI 77298772-89238 AN. BAGUS ROMADHON<br></strong>
				dengan format : <br>
				<strong>
				id pembelian : <?php echo $detail['id_pembelian'];?>
			<br></strong>
			Dan Kirimkan Bukti Transfer Melalui Menu <strong> <a href="riwayat.php">Riwayat->Pembayaran</a> 
			</strong></p>
			
		</div>
	</div>
</div>




			</div>
		</section>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>