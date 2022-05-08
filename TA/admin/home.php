<h2>selamat datang di admnistrator</h2>
<pre style="display: none;"><?php print_r($_SESSION["admin"]);  ?></pre>
<?php echo "selamat datang mas "; ?>
<?php print_r($_SESSION["admin"]["username"]);?>

 <div class="card bg-success" style="width: 18rem;">
                 

                <!DOCTYPE html>
                <html>
                <head>
                	<title></title>
                	    <meta charset="utf-8">
						    <meta name="viewport" content="width=device-width, initial-scale=1">

						    <!-- Bootstrap CSS -->
						   
						    <script src="https://kit.fontawesome.com/7ec25019f1.js" crossorigin="anonymous"></script>

						   
						    <style type="text/css">

						      span{
						        color: black;
						        
						      }
						      .col-md-4{
						      	margin-left: 10px;
						      	margin-right: 30px;

						      }
						    </style>
                </head>
                <body>
                
                <div class="col-md-4">
                	
                	 <div class="card bg-success" style="width: 18rem;">
                	 <div class="card-body">
                    <div>
                        <i class="fas fa-shopping-basket ml-5"></i>
                    </div>
                    <h5 class="card-title">Jumlah Pembelian</h5>
                    <div class="display-4">
                    <?php
                    
                    $query="SELECT * FROM pembelian";
                    $hasil=mysqli_query($koneksi,$query);
                    $jum=mysqli_num_rows($hasil);
                    echo $jum;
                    ?>
                    </div>
                    <a href="index.php?halaman=pembelian"><p class="card-text text-white">Lihat Detail<i class="fas fa-angle-double-right"></i></p></a>
                  </div>
                </div>
         
                </div>
                <div class="col-md-4">
                	
                	 <div class="card bg-success" style="width: 18rem;">
                	 <div class="card-body">
                    <div>
                        <i class="fas fa-user ml-2"></i>
                    </div>
                    <h5 class="card-title">Jumlah Pembelian</h5>
                    <div class="display-4">
                    	</div>
                    <?php
                    
                    $query="SELECT * FROM pelanggan";
                    $hasil=mysqli_query($koneksi,$query);
                    $jum=mysqli_num_rows($hasil);
                    echo $jum;
                    ?>
                    </div>
                    <a href="index.php?halaman=pembelian"><p class="card-text text-white">Lihat Detail<i class="fas fa-angle-double-right"></i></p></a>
                  
                </div>


                </div>
                <div class="col-md-4">
                	 <div class="card bg-success" style="width: 18rem;">
                	 <div class="card-body">
                    <div>
                        <i class="fas fa-shopping-basket ml-5"></i>
                    </div>
                    <h5 class="card-title">Jumlah Produk</h5>
                    <div class="display-4">
                    <?php
                    
                    $query="SELECT * FROM produk";
                    $hasil=mysqli_query($koneksi,$query);
                    $jum=mysqli_num_rows($hasil);
                    echo $jum;
                    ?>
                    </div>
                    <a href="index.php?halaman=pembelian"><p class="card-text text-white">Lihat Detail<i class="fas fa-angle-double-right"></i></p></a>
                  </div>
                </div>
         
                </div>
               

                 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
                </body>
                </html>