
<?php 
session_start();
include 'koneksi.php';

//nek gak onk session pelanggan di arahno di nde login .php
if (!isset($_SESSION["pelanggan"]))
  {
  	echo "<script>alert('silahkan login');</script>";
  	echo "<script>location='login.php';</script>";
  }
 if (!isset($_SESSION["keranjang"])) 
 {
  	echo "<script>alert('ANDA BELUM BERBELANJA, SILAHKAN BERBALNJA TERLEBIH DAHULU ');</script>";
  	echo "<script>location='index.php';</script>";
  
  } 
?>
<!DOCTYPE html>
<html>
<head>
	<title>checkout</title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	<link rel="stylesheet" type="text/css" href="stylenav.css">
	<script src="https://kit.fontawesome.com/f1fba031da.js" crossorigin="anonymous"></script>
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
 		 button{
 		 	height: 50px;
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
		<!--  -->
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
							
						</tr>
					</thead>
					<tbody>
						<?php $nomor=1;?>
						<?php $totalbelanja=0; ?>
						<?php $subberats=0; ?>
						<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah):?>
					<!-- menampilkan produk seng di perulangan o karo for each berdasarkan $id_produk seng entok teko a href beli -->
					<?php 
					$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
					while ($pecah = $ambil->fetch_assoc()){;
					$subharga= $pecah['harga_produk']*$jumlah;
					$subberat1=$pecah['berat_produk']*$jumlah;
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
							<td><?php echo $jumlah;?></td>
							<td><?php echo number_format($subharga);?></td>
							
						</tr>
						<?php $nomor++;?>
					<?php $totalbelanja+=$subharga ?>
					<?php $subberats +=$subberat1 ?>
					<?php } ?>
					<?php endforeach; ?>
					</tbody>

					<tfoot>
						<?php 
							$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
							$pecah = $ambil->fetch_assoc();
							

						 ?>
						<tr>
							<th colspan="3"> <?php echo $subberats; ?></th>
							<th>Rp. <?php  echo number_format($totalbelanja); ?></th>
						</tr>
					</tfoot>

				</table>
			
				<form method="post">

					<div class="row">
						<div class="col-md-2">	
							<div class="form-group">
								<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>" class="form-control" >
							</div>
						</div>
						<div class="col-md-2">
					<div class="form-group">
						<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telepon_pelanggan'] ?>" class="form-control" >
					</div>
					
					</div>


			<div class="col-md-2">
				<div class="form-group">
					<label>Provinsi</label>
					<select class="form-control" name="nama_provinsi">
						
					</select>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label>Distrik</label>
					<select class="form-control" name="nama_distrik">
						
					</select>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label>Ekspedisi</label>
					<select class="form-control" name="nama_ekspedisi">
						
					</select>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label>Paket</label>
					<select class="form-control" name="nama_paket"> 

					</select>
					
				</div>
			</div>

					<div class="form-group">
						<label>Alamat Lengkap Pengiriman</label>
						<textarea class="form-control" name="alamat_pengiriman" placeholder="masukan alamat lengkap pengiriman "></textarea>
					</div>
					<input type="hidden" name="total_berat" value="<?php echo $subberats ?>">
					<input type="hidden" name="provinsi">
					<input type="hidden" name="tipe">
					<input type="hidden" name="distrik">
					<input type="hidden" name="kodepos">
					<input type="hidden" name="ekspedisi">
					<input type="hidden" name="paket">
					<input type="hidden" name="ongkir">
					<input type="hidden" name="estimasi">
					<button class="btn btn-primary" name="checkout"> checkout </button>
				</form>

				<?php  
				if (isset($_POST["checkout"]))
			  {
			  	$provinsi=$_POST["provinsi"];
			  	$tipe=$_POST["tipe"];
			  	$distrik=$_POST["distrik"];
			  	$kodepos=$_POST["kodepos"];
			  	$ekspedisi=$_POST["ekspedisi"];
			  	$paket=$_POST["paket"];
			  	$ongkir=$_POST["ongkir"];
			  	$estimasi=$_POST["estimasi"];

				$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
				$id_ongkir = $_POST["id_ongkir"];
				$tanggal_pembelian = date("Y-m-d");
				$alamat_pengiriman = $_POST['alamat_pengiriman'];

				$ambil_chechkout = $koneksi->query("SELECT * FROM tabel_ongkir WHERE id_ongkir='$id_ongkir'");
				
				$ongkir_array = $ambil_chechkout->fetch_assoc();
				$nama_kota = $ongkir_array['nama_kota'];
				$tarif= $ongkir_array['tarif'];


				$total_pembelian = $totalbelanja+$tarif;


				// menyimpan data ke tabel pembelian 
				$koneksi->query("INSERT INTO pembelian 
					(id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman,provinsi,tipe,distrik,kodepos,ekspedisi,paket,ongkir,estimasi) 
					VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_pengiriman','$provinsi','$tipe','$distrik','$kodepos','$ekspedisi','$paket','$ongkir','$estimasi')");

			
				//mendapatkan id pembelian terbaru
				$id_pembelian_dektas = $koneksi->insert_id;
			



				foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
					{
						
						//mendapatkan data produk berdasarkan id_produk
						$ambilproduk = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
						$perproduk = $ambilproduk->fetch_assoc();

						$nama = $perproduk['nama_produk'];
						$harga = $perproduk['harga_produk'];
						$berat = $perproduk['berat_produk'];

						$subberat = $perproduk['berat_produk']*$jumlah;
						$subharga = $perproduk['harga_produk']*$jumlah;
						
						$koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,jumlah,nama,harga,berat,subberat,subharga) VALUES ('$id_pembelian_dektas','$id_produk','$jumlah','$nama','$harga','$berat','$subberat','$subharga')");
						// skrip update stock

						$koneksi->query("UPDATE produk SET stock_produk=stock_produk-$jumlah WHERE id_produk='$id_produk'");

					}


					//mengkosongkan keranjang nek wes chechkout 
					
					unset($_SESSION["keranjang"]);


					// tampilan di alihkan ke jhalaman nota , nota dari npembelian yang barusan 
					echo "<script>alert('pembelian sukses');</script>";
					echo "<script>location='nota.php?id=$id_pembelian_dektas';</script>";

			}


				?>
				<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
	$(document).ready(function(){
		$.ajax({
			type:'post',
			url:'dataprovinsi.php',
			success:function(hasil_provinsi)
			{
				$("select[name=nama_provinsi]").html(hasil_provinsi);
				
			}
		});
	$("select[name=nama_provinsi]").on("change",function(){
// ambil id_provinsi yang dipilih (dari atribut pribadi/bid ah)
	var id_provinsi_terpilih = $("option:selected",this).attr("id_provinsi");
		$.ajax({
			type:'post',
			url:'datadistrik.php',
			data:'id_provinsi='+id_provinsi_terpilih,
			success:function(hasil_distrik)
			{
				$("select[name=nama_distrik]").html(hasil_distrik);
			}
		});
		});
// ekspedisi
	$.ajax({
		type:'post',
		url:'dataekspedisi.php',
		success:function(hasil_ekspedisi)
		{
			// console.log(hasil_ekspedisi);
			$("select[name=nama_ekspedisi]").html(hasil_ekspedisi);
		}

	});
	$("select[name=nama_ekspedisi]").on("change",function(){
		// mendapatkan data ongkos kirim 

		// mendapatkan ekspedisi yang di beli
		var ekspedisi_terpilih = $("select[name=nama_ekspedisi]").val();
		
	
		// mendapatkan id_ditrik yang dipilih pengguna
		var distrik_terpilih = $("option:selected","select[name=nama_distrik]").attr("id_distrik");
	
		// mendapatkan total berat dari inputan 
		var total_berat = $("input[name=total_berat]").val();
		$.ajax({
			type:'post',
			url:'datapaket.php',
			data:'ekspedisi='+ekspedisi_terpilih+'&distrik='+distrik_terpilih+'&berat='+total_berat,
			success:function(hasil_paket)
			{
				// console.log(hasil_paket);
				$("select[name=nama_paket]").html(hasil_paket);
				// letakan nam ekspidisi terpilih di inputan ekspedisi
				$("input[name=ekspedisi]").val(ekspedisi_terpilih);
			}
		})
	});
	$("select[name=nama_distrik]").on("change",function(){
		var prov = $("option:selected",this).attr("nama_provinsi");
		var dis = $("option:selected",this).attr("nama_distrik");
		var tipe = $("option:selected",this).attr("tipe_distrik");
		var kodepos = $("option:selected",this).attr("kodepos");
		$("input[name=provinsi]").val(prov);
		$("input[name=distrik]").val(dis);
		$("input[name=tipe]").val(tipe);
		$("input[name=kodepos]").val(kodepos);

	});
	$("select[name=nama_paket]").on("change",function(){
		var paket = $("option:selected",this).attr("paket");
		var ongkir = $("option:selected",this).attr("ongkir");
		var etd = $("option:selected",this).attr("etd");
		$("input[name=paket]").val(paket);
		$("input[name=ongkir]").val(ongkir);
		$("input[name=estimasi]").val(etd);
})

	});
</script>
 

			</div>
		</section>
<pre>
	<!-- <?php print_r($_SESSION['pelanggan']); ?> -->
	<!-- <?php print_r($_SESSION["keranjang"]);?> -->
</pre>


</body>
</html>