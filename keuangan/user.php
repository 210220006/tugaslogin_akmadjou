<html>
	<head>
	<style>
			html{
				background:url('img/jou46.jpg');
				background-repeat:no-repeat;
				background-size:cover;
			}
			</style>
		<title>INDEHOY~JOU~</title>
	</head>
	<body>
		<h2>MODULE USER</h2>
		<br/>
		<a href="tambah_user.php">+ TAMBAH USER</a>
		<br/>
		<table border="1">
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Password</th>
				<th>Level</th>
				<th>Status</th>
				<th>OPSI</th>
			</tr>
			<?php
				include 'koneksi.php';
				$no = 1;
				$query = mysqli_query($koneksi,"SELECT * FROM user
												LEFT JOIN level on level.id_level = user.level 
									");
				while($data = mysqli_fetch_array($query))
				{
			?>
			<tr>
				<td><?php echo $no++;?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['password']; ?></td>
				<td><?php echo $data['nama_level']; ?></td>
				<td><?php echo $data['status']; ?></td>
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