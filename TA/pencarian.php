<?php 
include 'koneksi.php';
 
$keyword = $_GET["keyword"];

$semuadata=array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' OR deskripsi_produk LIKE '%$keyword%'");
 	while($pecah = $ambil->fetch_assoc()){

 		$semuadata[]=$pecah;
 	}
 	// echo "<pre>";
 	// print_r($semuadata);
 	// echo "</pre>";
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Pencarian Produk</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>

	<?php 
	include 'menu.php';
	 ?>
	<div class="container">
		<br><br>
		<h3>Hasil Pencarian : <?php echo $keyword ?></h3>

		<?php if (empty($semuadata)): ?>
			<div class="alert alert-danger">Produk <strong><?php echo $keyword ?></strong> Tidak Di Temukan</div>
		<?php endif ?>

		<div class="row">

<?php foreach ($semuadata as $key => $value): ?>
	
			   		
				   <div class="col-md-3">
				   	<div class="thumbnail">
				   		<div class="gambar">
				   		<img src="foto_produk/<?php echo $value['foto_produk'];?>" height="200" width="200" text-align="center">
				   		</div>
				   		<div class="caption">
				   			<h3><?php echo $value['nama_produk'];?></h3>
				   			<h5><?php echo number_format($value['harga_produk']); ?></h5>
				   			<a href="beli.php?id=<?php echo $value['id_produk'];?>" class="btn btn-primary">beli</a>
				   			<a href="detail.php?id=<?php echo $value['id_produk'];?>" class="btn btn-outline-secondary">detail</a>
				   		</div>
				   	</div>
				   </div>
<?php endforeach ?>
		</div>
	</div>
</body>
</html>