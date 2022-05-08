<?php
session_start();
include 'koneksi.php';
$id_pembelian = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM pembayaran LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian WHERE pembelian.id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();
// jika belum ada data pembayaran 
if (empty($detail)) 
{
	echo "<script>alert('data kosong ')</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}
// jika data pembayaran tidak sesuai dengan login 
if ($_SESSION["pelanggan"]['id_pelanggan']!==$detail["id_pelanggan"]) 
{

	echo "<script>alert('anda tidak berhak melihat pembayaran orang lain ')</script>";
	echo "<script>location='riwayat.php';</script>";
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
	include 'menu.php';
	?>

	<div class="container">
		<br><br><br>
		<h3>lihat pembayaran</h3>
		<div class="row"> 
			<div class="col-md-6">
				<table class="table">
					
					<tr>
						<th>Nama </th>
						<td><?php echo $detail["nama"]?></td>
					</tr>
					<tr>
						<th>Bank </th>
						<td><?php echo $detail["bank"]?></td>
					</tr>
					<tr>
						<th>Tanggal </th>
						<td><?php echo $detail["tanggal"]?></td>
					</tr>
					<tr>
						<th>Jumlah</th>
						<td>Rp. <?php echo number_format($detail["jumlah"]); ?></td>
					</tr>
					<tr>
						<td><a href="riwayat.php" class="btn btn-primary">Kembali</a></td>
					</tr>
				</table>
			</div>
			<div class="col-md-6">
				<img src="bukti_pembayaran/<?php echo $detail["bukti"];?>" alt="" class="img-responsive">

			</div>

		</div>

	</div>

</body>
</html>