<h2>tambah pelanggan</h2>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Id pelanggan</label>
		<input class="form-control" type="number" name="id">
	</div>

	<div class="form-group">
		<label>email </label>
		<input class="form-control" type="text" name="email">
	</div>

	<div class="form-group">
		<label>password</label>
		<input class="form-control" type="password" name="password">
	</div>

	<div class="form-group">
		<label>nama</label>
		<input class="form-control" type="text" name="nama">
	</div>

	<div class="form-group">
		<label>no telepon</label>
		<input class="form-control" type="number" name="telepon">
	</div>
<button class="btn btn-primary" name="tambah">tambah</button>
</form>
<?php 
if (isset($_POST['tambah'])) {
	$koneksi-> query("INSERT INTO pelanggan (id_pelanggan,email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan) VALUES ('$_POST[id]','$_POST[email]','$_POST[password]','$_POST[nama]','$_POST[telepon]')");

	echo "<div class='alert alert-info'>data tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
}
?>