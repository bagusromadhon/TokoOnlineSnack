
<?php 
$koneksi= new mysqli("localhost","root","","tokosnack");

?>

<?php 
if (isset($_POST['tambah'])) 
{
$koneksi->query("INSERT INTO admin (username,password) VALUES ('$_POST[username]','$_POST[password]')");	


	echo "<div class='alert alert-info'>data tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=tambahadmin'>"; 
}
?>


<h3>tambah admin </h3>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>username</label>	
		<input class="form-control" type="text" name="username">
	</div>
	<div class="form-group">
		<label>password</label>	
		<input class="form-control" type="password" name="password">
	</div>
<button class="btn btn-primary" name="tambah" type="submit">tambah</button>
</form>
<a href="index.php?halaman=listadmin" class="btn btn-primary">list admin</a>
