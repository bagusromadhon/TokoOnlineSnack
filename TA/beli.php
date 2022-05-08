<?php 
session_start();
//mendapatkan id produk dari url 
$id_produk = $_GET['id'];
	

//nek wes onk produk iku ndek keranjang produk e di +1
if (isset($_SESSION['keranjang'][$id_produk]))
	{
	$_SESSION['keranjang'][$id_produk]+=1;
	}
//selain itu nek gorong onk dikeranjanganggan di tuku 1
	else
	{
	$_SESSION['keranjang'][$id_produk] = 1;
	}

// larikan ke halaman keranjang
	echo "<script>alert('produk telah masuk ke keranjang');</script>";
	echo "<script>location='keranjang.php';</script>";
?>