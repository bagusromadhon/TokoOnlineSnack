<?php 
session_start();
//koneksi ke database
include 'koneksi.php';

?>

<?php 

//jika belum login
if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) 
{
echo "<script>alert('silahkan login Terlebih Dahulu');</script>";
echo "<script>location='login.php';</script>";
exit();
}


?>

<?php
// mendapatkan id pembelian teko url 
$id_pem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$id_pem'");
$detpem = $ambil->fetch_assoc();

$id_pelanggan_bayar = $detpem["id_pelanggan"];
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if ($id_pelanggan_login !== $id_pelanggan_bayar)
 {

echo "<script>alert('Terdeteksi, Kecurangan');</script>";
echo "<script>location='riwayat.php';</script>";
exit();
}


// echo "<pre>";

// print_r($detpem);
// print_r($_SESSION);
// echo "</pre>";

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

<div class="container">
	<br><br><br>
	
	<h2>konfirmasi pembayaran</h2>
	<p>kirim bukti pembayaran disini </p>
	<div class="alert alert-info">total tagihan anda <strong>Rp.<?php echo number_format($detpem ["total_pembelian"]+$detpem['ongkir']) ?></strong></div>

	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label>Nama penyetor</label>
			<input type="text" class="form-control" name="nama">
		</div>
		<div class="form-group">
			<label>bank</label>
			<input type="text" class="form-control" name="bank">
		</div>
		<div class="form-group">
			<label>jumlah</label>
			<input type="number" class="form-control" name="jumlah" min="1">
		</div>
		<div class="form-group">
			<label>foto bukti</label>
			<input type="file" name="bukti" class="form-control">
			<p class="text-danger">foto bukti harus JPG maksimal 2MB</p>
		</div>
		<button class="btn btn-primary" name="kirim">kirim</button>
	</form>
</div>
<?php 
if (isset($_POST["kirim"])) 
{
	    
   // upload foto bukti
	$namafoto=$_FILES['foto']['name'];
 	$lokasifoto = $_FILES['foto']['tmp_name'];
 	move_uploaded_file($lokasifoto,"img/pay/$namafoto");

	// BEN NEK KE REPLACE GAK ILANG / NEK ONK SENG UPLOAD BUKTI KEMBAR DALAM 2 PELANGGAN
	// $namafix = date("YmdHis").$namabukti;
	// move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafix");

	$nama = $_POST["nama"];
	$bank = $_POST["bank"];
	$jumlah = $_POST["jumlah"];
	$tanggal = date("Y-m-d");
// simpan pembayaran
	$koneksi->query("INSERT INTO pembayaran (id_pembelian,nama,bank,jumlah,tanggal,bukti) VALUES ('$id_pem','$nama','$bank','$jumlah','$tanggal','$namafix')");

// update dari pending jadi verifikasi
	$koneksi->query("UPDATE pembelian SET status_pembelian='menunggu di validasi ' WHERE  id_pembelian='$id_pem'");

		echo "<script>alert('bukti pembayaran telah di kirim, harap tunggu di verifikasi');</script>";
		echo "<script>location='riwayat.php';</script>";
		exit();
}

?>

</body>
</html>