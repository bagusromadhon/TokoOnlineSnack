<?php 
session_start();
$koneksi = new mysqli("localhost","root","","tokosnack");
?>

<!DOCTYPE html>
<html>
<head>
	<title>login pelanggan</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	 <link rel="stylesheet" type="text/css" href="styleregis.css">
</head>
<body>

	<<?php 
// navbar otomatis
include 'menu.php';
?>
<br><br><br>
<div class="container">

    <form id="signup" method="post">

        <div class="header">
        
            <h3>Login </h3>
            
            
            
        </div>
        
        <div class="sep"></div>

        <div class="inputs">
        
            <input type="email" name="email" placeholder="e-mail" autofocus />
        
            <input type="password" placeholder="Password" name="password" />


            
            <div class="checkboxy">
                <input name="cecky" id="checky" value="1" type="checkbox" /><label class="terms">I accept the terms of use</label>
            </div>
            
           
            <button type="submit" name="login" class="btn btn-warning"> login</button>
        <a href="register.php" class="alert alert-info" >Daftar</a>
        </div>

    </form>

​


		<?php 
		if (isset($_POST["login"])) 
		{
			$email = $_POST["email"];
			$password = $_POST["password"];
		// lakukan query ngecheck akun dari tabel pelanggan di tb database
			$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password' ");
		$akunsengcocok = $ambil->num_rows;
		// nek 1 seng cocok oleh melbu 
			if ($akunsengcocok==1) 
			{
			// wes melbu 
				//akun bentuk array
				$akun = $ambil->fetch_assoc();
				//simpan session
				$_SESSION["pelanggan"] = $akun;


				echo "<script>alert('anda sukses login');</script>";
				
				// jika sudah belanja 
				if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"]) ) 
				{
				echo "<script>location='checkout.php';</script>";
				}else{
					echo "<script>location='index.php';</script>";
				}
				

			}
			
			else
			{
				//gagal login
				echo "<script>alert('anda gagal login,periksa akun anda');</script>";
				echo "<script>location='login.php';</script>";
			}
		}
		?>
</div>
</body>
</html>