<?php 
$datakategori= array();
$ambil=$koneksi->query("SELECT * FROM kategori");
 while($pecah = $ambil->fetch_assoc()){
 	$datakategori[]=$pecah;
 }
 ?>
<h2>tambah produk</h2>
<form method="post" enctype="multipart/form-data">
	 <div class="form-group">
	 	<label>Kategori</label>
	 	<select class="form-control" name="kategori">
	 	<?php foreach ($datakategori as $key => $value): ?>
	 		
	 		<option value="<?php echo $value['id_kategori'] ?>"><?php echo  $value["nama_kategori"]; ?></option>
	 	<?php endforeach ?>
	 	</select>
	 </div>
	 <div class="form-group">
	 	<label>Nama</label>
	 	<input type="text" class="form-control" name="nama">
	 </div>	
	 <div class="form-group">
	 	<label>harga (Rp)</label>
	 	<input type="number" class="form-control" name="harga">
	 </div>
	 <div class="form-group">
	 	<label>berat (Gr)</label>
	 	<input type="number" class="form-control" name="berat">
	 </div>
	 <div class="form-group">
	 	<label>deskripsi</label>
	 	<textarea class="form-control" name="deskripsi" rows="10"></textarea>
	 </div>
	 <div class="form-group">
	 	<label>Foto</label>
	 	<input type="file" class="form-control" name="foto">
	 </div>
	 
	 <button class="btn btn-primary" name="save"> save</button>

</form>

<?php
if (isset($_POST['save']))
{
	$foto = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_produk/".$foto);
	$koneksi->query("INSERT INTO produk 
		(nama_produk,harga_produk,berat_produk,foto_produk,deskripsi_produk,id_kategori) VALUES 
		('$_POST[nama]','$_POST[harga]','$_POST[berat]','$foto','$_POST[deskripsi]','$_POST[kategori]')");

	echo "<div class='alert alert-info'>data tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}

?>
