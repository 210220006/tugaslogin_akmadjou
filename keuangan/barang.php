<html>
	<head>
	<style>
			html{
				background:url('img/jou46.jpg');
				background-repeat:no-repeat;
				background-size:cover;
			}
			</style>
		<title> INDEHOY~JOU~ </title>
	</head>
	<body>
		<h2>INDEHOY STORE</h2>
		<br/>
		<a href="tambah_barang.php">+ TAMBAH BARANG</a>
		<br/>
		<table border="1">
			<tr>
				<th>No</th>
				<th>Nama Barang</th>
				<th>Kode Barang</th>
				<th>QTY</th>
				<th>Kategori</th>
				<th>OPSI</th>
			</tr>
			<?php
				include 'koneksi.php';
				$no = 1;
				$query = mysqli_query($koneksi," SELECT * FROM barang b LEFT JOIN kategori k on b.kategori_id = k.id_kategori");
				while($data = mysqli_fetch_array($query))
				{
			?>
			<tr>
				<td><?php echo $no++;?></td>
				<td><?php echo $data['nama_barang']; ?></td>
				<td><?php echo $data['kode_barang']; ?></td>
				<td><?php echo $data['qty']; ?></td>
				<td><?php echo $data['nama_kategori']; ?></td>
				<td>
					<a href="edit_user.php?id=<?php echo $data['id']; ?>">EDIT</a>
					<a href="hapus_user.php?id=<?php echo $data['id']; ?>">HAPUS</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>