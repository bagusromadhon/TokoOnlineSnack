<?php 
session_destroy();
echo "<script> alert('anda telah logout');</script>";
echo "<script>location='loginadmin.php';</script>";
?>