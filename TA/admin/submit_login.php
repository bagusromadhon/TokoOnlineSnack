<?php 
session_start();
include 'koneksilogin.php';
$username =$_POST['username'];
$password =$_POST['password'];


// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);


// menyeleksi data user dengan username dan password yang sesuai

   $query = mysqli_query($con, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
   $data = mysqli_fetch_array($query);
   $jml = mysqli_num_rows($query);
// cek apakah username dan password di temukan pada database
   if($jml > 0){

   $data = mysqli_fetch_assoc($login);

   // cek jika user login sebagai admin
   if($data['level']=="admin"){

      // buat session login dan username
      $_SESSION['username'] = $username;
      $_SESSION['level'] = "admin";
      // alihkan ke halaman dashboard admin
      header("location:index.php");

 
   }else{

      // alihkan ke halaman login kembali
      header("location:login.php?pesan=gagal");
   }  
}

?>