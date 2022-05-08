<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	<link rel="stylesheet" type="text/css" href="stylenav.css">
	<script src="https://kit.fontawesome.com/f1fba031da.js" crossorigin="anonymous"></script>
	<style type="text/css">
		header .logo{
			color: #333;
		}
		header{
			box-shadow: 0 5px 20px rgba(0,0,0,0.5);
}
		}*{
   			 font-family: 'Poppins', sans-serif;
 		 }
	</style>

	
</head>
<body>

		
		<header>

			<div class="btn-group">
   <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="fas fa-user-circle fa-3x"></i></a>
  <div class="dropdown-menu">
    <!-- isi dropdown e  -->
    <?php if (isset($_SESSION["pelanggan"])): ?>
    <a class="dropdown-item" href="profile.php?id=<?php echo $_SESSION["pelanggan"]['id_pelanggan']; ?>">Profile</a>
  <a href="riwayat.php"onclick="toggleMenu();"class="dropdown-item"> riwayat</a>
      <?php else: ?>
        <a href="login.php"onclick="toggleMenu();" class="dropdown-item"> login</a>
    <a class="dropdown-item" href="register.php">Register</a>
    <?php endif ?>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="logout.php">Logout</a>
  </div>
</div>

			<!--  -->

		<a href="" class="logo">snack<span>.</span></a>
		<div class="menuToggle" onclick="toggleMenu();"></div>
		<ul class="navigation">
			<li><a href="../onelandign/index.php" onclick="toggleMenu();"> Home</a></li>
			<li><a href="index.php" onclick="toggleMenu();"> Belanja </a></li>
			<li><a href="keranjang.php"onclick="toggleMenu();"> keranjang</a></li>
			<li><a href="checkout.php"onclick="toggleMenu();"> checkout</a></li>
			
			
		</ul>
		
	</header>

		</ul>
	</header>

	<script type="text/javascript">
		window.addEventListener('scroll',function(){
			const header = document.querySelector('header');
			header.classList.toggle("sticky",window.scrollY > 0);

		});
		
	</script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>