<?php 
$koneksi= new mysqli("localhost","root","","tokosnack");
?>
<!DOCTYPE html>
<html>
<head>
	<title>nota pembelian</title>
		<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>

		<nav class="navbar navbar-default">
			<div class="container">
				<ul class="nav navbar-nav">
					<li><a href="index.php">Home</a></li>
					<li><a href="keranjang.php">Keranjang</a></li>
					<!-- jk sudah login -->
					<?php if (isset($_SESSION["pelanggan"])):?>
					<li><a href="logout.php">logout</a></li>
					<!-- selain itu belm ada session pelanggan -->
					<?php else: ?>
					<li><a href="login.php">Login</a></li>
				<?php endif?>
					<li><a href="checkout.php">Checkout</a></li>
				</ul>			
			</div>
		</nav>

		<section class="konten">
			<div class="container">
				<!-- nota copy an tekok admin -->
				<h2>detail pembelian</h2>
<?php 
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail=$ambil->fetch_assoc();
?>
<pre><?php print_r($detail);?></pre>
<strong><?php echo $detail['nama_pelanggan'];?></strong><br>
<P>
	<?php echo $detail['telepon_pelanggan'];?> <br>
	<?php echo $detail['email_pelanggan'];?> <br>
</P>
<p>
	tanggal: <?php echo $detail['tanggal_pembelian'];?> <br>
	total: <?php echo $detail['total_pembelian'];?> <br>
</p>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>nama produk</th>
			<th>harga </th>
			<th>jumlah </th>
			<th>subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>

		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $pecah['nama_produk'];?></td>
			<td><?php echo $pecah['harga_produk'];?></td>
			<td><?php echo $pecah['jumlah'];?></td>
			<td>
				<?php echo $pecah['harga_produk']*$pecah['jumlah'];?>
			</td>
			
		</tr>
		<?php $nomor++?>
	<?php } ?>
	</tbody>
</table>
			</div>
		</section>
</body>
</html>