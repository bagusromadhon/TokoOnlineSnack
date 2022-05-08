<h2>data pembayaran</h2>

<?php
// id pembelian dari url
$id_pembelian = $_GET['id'];

// mengambil data pembayaran berdasarkan id_pembelian

$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
$pembayaran = $ambil->fetch_assoc();

?>
<div class="row">
	<div class="col-md-6">
		<table class="table">
			<tr>
				<th>nama</th>
				<td><?php echo $pembayaran["nama"];?></td>
			</tr>
			<tr>
				<th>bank</th>
				<td><?php echo $pembayaran["bank"]?></td>
			</tr>
			<tr>
				<th>jumlah</th>
				<td><?php echo $pembayaran ['jumlah']?></td>
			</tr>
			<tr>
				<th>id pembelian</th>
				<td><?php echo $pembayaran['id_pembelian']?></td>
			</tr>
			<tr>
				<th>tanggal</th>
				<td><?php echo $pembayaran['tanggal']?></td>
			</tr>
		</table>
	</div>
	
	<div class="col-md-6"> 
		<img src="../bukti_pembayaran/<?php echo $pembayaran['bukti']?>" alt="" class="img-responsive" >
	</div>
</div>

<form method="post">
	<div class="form-group">
		<label>No resi pengiriman</label>
		<input type="text" name="resi" class="form-control">
	</div>
	<div class="form-group">
		<label>Status</label>
		<select name="status" class="form-control">
			<option>pilih status</option>
			<option value="lunas">lunas</option>
			<option value="barang dikirim">Barang dikirim</option>
			<option value="batalkan">batalkan</option>
		</select>
	</div>
	<button class="btn btn-primary" name="proses">Proses</button>

</form>
<?php
if (isset($_POST["proses"]))
 {
 	$resi=$_POST["resi"];
 	$status=$_POST["status"];

 	$koneksi->query("UPDATE pembelian SET resi_pengiriman='$resi', status_pembelian='$status' WHERE id_pembelian='$id_pembelian'");
 	echo "<script>alert('data pembelian sukses di update');</script>";
 	echo "<script>location='index.php?halaman=pembelian';</script>";
 }

?>