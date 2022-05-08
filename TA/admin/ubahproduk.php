
<h2>ubah produk </h2>
<?php 
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]' ");
$pecah = $ambil->fetch_assoc();
// echo "<pre>";
  // print_r($pecah);
  // echo "</pre>";

?>
<?php 
$datakategori= array();
$ambil=$koneksi->query("SELECT * FROM kategori");
 while($tiap = $ambil->fetch_assoc()){
 	$datakategori[]=$tiap;
 // echo "<pre>";
 // print_r($datakategori);
 // echo "</pre>";
 // 
 }
 ?>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
	 	<label>Kategori</label>
	 	<select class="form-control" name="kategori">
	 	<option>Pilih Kategori</option>
	 	<?php foreach ($datakategori as $key => $value): ?>
	 		
	 		<option value="<?php echo $value['id_kategori'] ?>" <?php if ($pecah["id_kategori"]==$value["id_kategori"]) {echo "selected";}?>
	 			><?php echo  $value["nama_kategori"]; ?>
	 			
	 		</option>
	 	<?php endforeach ?>
	 	</select>
	 </div>
	<div class="form-group">
		<label>nama produk</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk'];?>">
	</div>

	<div class="form-group">
		<label>harga produk</label>
		<input type="text" name="harga" class="form-control" value="<?php echo $pecah['harga_produk'];?>">
	</div>
	<div class="form-group">
		<label>berat produk</label>
		<input type="number" name="berat" class="form-control" value="<?php echo $pecah['berat_produk'];?>">
	</div>
	<div class="form-group">
		<label>Stock Produk</label>
		<input type="number" name="stock" class="form-control" value=" <?php echo $pecah['stock_produk']; ?> ">
	</div>
	<div class="form-group">
		<label>foto produk</label>
		<img src="../foto_produk/<?php echo $pecah['foto_produk']?>" width="200">
	</div>
	<div class="form-group">
		<label>ganti foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<div class="form-group">
		<label>deskripsi</label>
		<textarea name="deskripsi" class="form-control" rows="10"><?php echo $pecah['deskripsi_produk']?></textarea>
	</div>
	<button class="btn btn-primary" name="ubah">Ubah </button>
</form>

<?php 
if (isset($_POST['ubah']))
 {
 	$namafoto=$_FILES['foto']['name'];
 	$lokasifoto = $_FILES['foto']['tmp_name'];
 	//kl foto dirubah
 	if (!empty($lokasifoto)) 
 	{
 		move_uploaded_file($lokasifoto,"../foto_produk/$namafoto");

 		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',stock_produk='$_POST[stock]',foto_produk='$namafoto',deskripsi_produk='$_POST[deskripsi]',id_kategori='$_POST[kategori]' WHERE id_produk='$_GET[id]'");
 	}
 	//nek foto gak di rubah code e iki
 	else{
 		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',stock_produk='$_POST[stock]',deskripsi_produk='$_POST[deskripsi]',id_kategori='$_POST[kategori]' WHERE id_produk='$_GET[id]'");
 	}
 	echo "<script>alert('data produk telah diubah ');</script>";
 	echo "<script>location='index.php?halaman=produk';</script>";
 	
 }
?>