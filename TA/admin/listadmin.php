

<h2>list admin</h2>
<table class="table table-bordered">
	<thead>
			<tr>
				<th>no</th>
				<th>username</th>
				<th>password</th>
				<th>aksi</th>
			</tr>
	</thead>

	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi-> query("SELECT * FROM admin");?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $pecah['username'];?></td>
			<td><?php echo $pecah['password'];?></td>
			<td>
				<a href="index.php?halaman=ubahpelanggan&id=<?php echo $pecah['id_pelanggan'];?>" class="btn btn-warning">ubah</a>
				<a href="" class="btn btn-danger">hapus</a>
			</td>
		</tr>
		<?php $nomor++;?>
		<?php } ?>
	</tbody>
</table>