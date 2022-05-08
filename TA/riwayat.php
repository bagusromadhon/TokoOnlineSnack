<?php 
session_start();
//koneksi ke database
include 'koneksi.php';

?>

<?php 

//jika belum login
if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) 
{
echo "<script>alert('silahkan login blok');</script>";
echo "<script>location='login.php';</script>";
exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

<?php 
// navbar otomatis
include 'menu.php';
?>
<br><br><br>


<!-- <pre><?php //print_r($_SESSION) ?></pre> -->

<section class="riwayat">
	<br>
	<br>
	<div class="container">
		<h3>riwayat belanja pelanggan <?php echo  $_SESSION["pelanggan"]["nama_pelanggan"]  ?> </h3>
		<table class="table talbe-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>tanggal</th>
					<th>Status</th>
					<th>Total</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<!-- mendapatkan id pelanggan yang login  -->
				<?php 
				$nomor=1;
				$id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];
				$ambil = $koneksi->query("SELECT * FROM  pembelian WHERE id_pelanggan='$id_pelanggan'");
				while($pecah = $ambil->fetch_assoc()){
				?>
				<tr>
					<td><?php echo $nomor?></td>
					<td><?php echo $pecah ["tanggal_pembelian"];?></td>
					<td><span class="badge badge-success"><?php echo $pecah ["status_pembelian"];?></span>
						<br>
						<?php if (!empty($pecah['resi_pengiriman'])):?>
						Resi:<?php echo $pecah['resi_pengiriman'];?>
						<?php endif ?>

					
					</td>
					<td><?php echo number_format($pecah ["total_pembelian"]+$pecah['ongkir']) ?></td>
					<td>
						<a href="nota.php?id=<?php echo $pecah["id_pembelian"]?>" class="btn btn-info">nota</a>
						<?php if ($pecah['status_pembelian']=="pending"): ?>
							<a href="pembayaran.php?id=<?php echo $pecah["id_pembelian"]?>" class="btn btn-success">pembayaran </a>
						<?php else: ?>
							<a href="lihat_pembayaran.php?id=<?php echo $pecah["id_pembelian"];?>" class="btn btn-warning">lihat pembayaran</a>

						<?php endif ?>
						
					</td>
					
				</tr>
				<?php $nomor++ ?>
			<?php } ?>
			</tbody>
		</table>
	</div>
</section>

</body>
</html>
