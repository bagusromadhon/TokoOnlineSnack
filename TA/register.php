
<?php 
include 'koneksi.php';

 ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="styleregiss.css">
</head>
<body>
  <br>
  <br><br><br>
  <br>
<div id='container'>
  <div class='signup'>
     <form method="post">
       <input type='text' placeholder='Email:' name="email" />
       <input type='password' placeholder='Password:' name="password" />
       <input type='text' placeholder='Nama:' name="nama"  />
       <input type='text' placeholder='Phone:' name="telepon" />
   
       <button type="submit" name="save" > submit</button>
     </form>
     <?php 
     if (isset($_POST['save'])) {
        $koneksi->query("INSERT INTO pelanggan 
          (email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan) VALUES 
          ('$_POST[email]','$_POST[password]','$_POST[nama]','$_POST[telepon]')");
                echo "<script>alert('berhasil mendaftar');</script>";
                echo "<script>location='login.php';</script>";
    }
      ?>


     
  </div>
  <div class='whysign'>
    <h1>Register User Snack</h1>
    <p>Harap Memasukan Data Dengan Benar , Demin Kenyanan Bersama , Silahkan mendaftar</p>
    <p>Produk Yang Kami Jual: 
      <span>Snack</span>
      <span>Makanan ringan</span>
      <span>Minuman</span>
    </p>
  </div>
</div>

</body>
</html>