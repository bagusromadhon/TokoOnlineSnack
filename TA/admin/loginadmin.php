
<?php
session_start();
//koneksi
$koneksi = new mysqli("localhost","root","","tokosnack");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="login.css">
	 <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
	<div class="wrapper">
		
		<h1>Snack Online</h1>
		
		<form role="form" method="post" >

			<input type="text" name="username" placeholder="Username">	

			<input type="password" name="password" placeholder="password">


			<button name="login">login</button>
		</form>
		<?php 
		if (isset($_POST['login']))
		{
			$ambil= $koneksi->query("SELECT * FROM admin WHERE username='$_POST[username]' AND password='$_POST[password]'"); 
			$sengcocok=$ambil->num_rows;
			if ($sengcocok==1) 
			{
				$_SESSION['admin']=$ambil->fetch_assoc();
				echo "<div class='alert alert-info'>login sukses </div>";
				echo "<meta http-equiv='refresh' content='1;url=index.php'>";
			}
			else
			{
				echo "<div class='alert alert-danger'>login gagal,anda belum terdaftar sebagai admin </div>";
				echo "<meta http-equiv='refresh' content='1;url=loginadmin.php'>";
			}

		}

		?>


		<div class="bottom-text">
			<a href="../login.php">Masuk sebagai user</a>
			
		</div>


	</div>
	   <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

</body>


</html>