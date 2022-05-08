<?php 
session_start();
//koneksi ke database
include 'koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>toko snack </title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="stylenav.css">
    <script src="https://kit.fontawesome.com/f1fba031da.js" crossorigin="anonymous"></script>


<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,300&display=swap');
  .navigation{
    margin-top: 20px;

  }
  *{
    font-family: 'Poppins', sans-serif;
  }
  header{
    background-color: transparent;
  }
  

</style>
</head>
<body>

  <header>
    <?php $ambil = $koneksi->query("SELECT * FROM pelanggan");  
        $pecah_pelanggan = $ambil->fetch_assoc();

     ?>

<!-- Example single danger button -->
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
     <!-- navbar menu  -->



   

    <a href="" class="logo">snack<span>.</span></a>

    <div class="menuToggle" onclick="toggleMenu();"></div>
    <ul class="navigation"><br>
      <li><a href="onelandign/index.php" onclick="toggleMenu();"> Home</a></li>
      <li><a href="index.php" onclick="toggleMenu();"> Belanja</a></li>
      <li><a href="keranjang.php"onclick="toggleMenu();"> keranjang</a></li>
     
      <li><a href="checkout.php"onclick="toggleMenu();"> checkout</a></li>
     
      <li>
    <form action="pencarian.php" method="get" class="">
      <input type="text" class="" name="keyword" placeholder="Search Barang..">
      <button class="btn btn-danger">Cari..</button>
    </form>
    </li>
    </ul>
  </header>
  
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 img-responsive" src="../img/ss.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 img-responsive" src="../img/malaysia_cuisine.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 img-responsive"  src="../img/s3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


    <!-- konten e utowo beranda e-->
    <section class="konten pt-5">
      <div class="container">  


        <h1>Produk</h1>
          
         <div class="row">

          <?php $ambil=$koneksi->query("SELECT * FROM produk"); ?> 
          <?php while($perproduk = $ambil->fetch_assoc()){?>
            
           <div class="col-md-3 mt-4">
            <div class="thumbnail border border-primary">
              <div class="gambar">
              <div class="card">
          <img class="card-img-top rounded"  src="foto_produk/<?php echo $perproduk['foto_produk'];?>" alt="Card image cap" height="250" width="200">
          </div>
          <div class="card-body">
            <h5 class="card-title"><?php echo $perproduk['nama_produk'];?></h5>
            <h5>Rp.<?php echo number_format($perproduk['harga_produk']); ?></h5>
          

            <a href="beli.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-primary">Beli</a>
                <a href="detail.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-outline-secondary">Detail</a>
          </div>
          </div>
        </div>
      </div>

        <?php } ?>

           



         
    </section>


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