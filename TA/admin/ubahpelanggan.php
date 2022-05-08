<h2>ubah pelanggan </h2>
<?php
$ambil=$koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

echo "<prev>";
	print_r($pecah);
echo "</prev>";

?>
<form method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label>id tidak dapat di ubah</label><br>
		<label><h4>ID_PELANGGAN =</h4></label>
		<label><?php echo $pecah['id_pelanggan'];?></label>
	</div>
	
	<div class="form-group">
		<label>nama</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_pelanggan'];?>">
	</div>

	<div class="form-group">
		<label>email </label>
		<input type="email" name="email" class="form-control" value="<?php echo $pecah['email_pelanggan'];?>">
	</div>

	<div class="form-group">
		<label>password pelanggan</label>
		<input type="text" name="password" class="form-control" value="<?php echo $pecah['password_pelanggan'];?>">
	</div>

	<div class="form-group">
		<label>telepon</label>
		<input type="number" name="telepon" class="form-control" value="<?php echo $pecah['telepon_pelanggan'];?>">
	</div>

	<button class="btn btn-primary" name="simpan">simpan </button>



</form>
<?php
if (isset($_POST['simpan']))
{
$koneksi->query("UPDATE pelanggan SET nama_pelanggan='$_POST[nama]',email_pelanggan='$_POST[email]',password_pelanggan='$_POST[password]',telepon_pelanggan='$_POST[telepon]' WHERE id_pelanggan='$_GET[id]'");
}
echo "<script>alert('data pelanggan telah di ubah ');</script>";
echo "<script>location='index.php?halaman=pelanggan';</script>";
?>

