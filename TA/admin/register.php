<?php 
	$username = $_POST['username'];	
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$level = "user";


	if ($password == $password2) {
		$koneksi->query("SELECT * FROM admin ");

		$pengacak = "p3ng4c4k";

		$passmd = md5($pengacak . md5($password));

		$query = "INSERT INTO admin VALUES ('','$username','$passmd','$level')";
		$hasil = mysqli_query($koneksi,$query);

		if ($hasil) {
			
			echo "<script type='text/javascript'>
					 alert('akun berhasil terdaftar');
					 document.location.href='login.php';
					</script>";

		}
		else {
			echo "<script type='text/javascript'>
					 alert('usernmae sudah ada yang memiliki');
					 document.location.href='daftar.php';
					</script>";
		}
		
	}
	else{
		echo "<script type='text/javascript'>
					 alert('password yang anda masukkan tidak sama');
					 document.location.href='daftar.php';
					</script>";
	}
 ?>