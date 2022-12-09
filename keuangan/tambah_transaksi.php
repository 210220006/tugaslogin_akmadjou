<!DOCTYPE html>
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

	<?php
		// koneksi database
		include 'koneksi.php';
		// menangkap data yang di kirim dari form
		if( !empty($_POST['save']) )
		{
			$tgl_transaksi = $_POST['tgl_transaksi'];
			$no_transaksi = $_POST['no_transaksi'];
			$jenis_transaksi = $_POST['jenis_transaksi'];
			$barang_id = $_POST['barang_id'];
			$diskon_member = $_POST['diskon_member'];
			$diskon_barang = $_POST['diskon_barang'];
			$total_pembelian = $_POST['total_pembelian'];
			$total_diskon = $_POST['total_diskon'];
			$jumlah_transaksi = $_POST['jumlah_transaksi'];
			$member_id = $_POST['member_id'];

			// menginput data ke database
			$query=mysqli_query($koneksi,"insert into transaksi values('','$tgl_transaksi','$no_transaksi','$jenis_transaksi','$barang_id','$diskon_member','$diskon_barang','$total_pembelian','$total_diskon','$jumlah_transaksi','$member_id')");

			if($query)
			{
				// mengalihkan halaman kembali
				header("location:transaksi.php");
			}
			else
			{
				echo mysqli_error($koneksi);
			}
		}	

		$querybarang = "SELECT * FROM barang";
		$resultbarang = mysqli_query ($koneksi,$querybarang); 

		$querymember = "SELECT * FROM member
						";
		$resultmember = mysqli_query ($koneksi,$querymember); 
	?>
	<body>
		<h2>INDEHOY STORE</h2>
		<br/>
		<a href="transaksi.php">KEMBALI</a>
		<br/>
		<br/>
		<h3>TAMBAH DATA TRANSAKSI</h3>
		<form method="POST">
			<table>
				<tr>
					<td>Tanggal Transaksi</td>
					<td><input type="date" name="tgl_transaksi"></td>
				</tr>
				<tr>
					<td>No. Transaksi</td>
					<td><input type="text" name="no_transaksi"></td>
				</tr>
				<tr>
					<td>Jenis Transaksi</td>
					<td>
						<select name="jenis_transaksi">
							<option value="">-----Pilih-----</option>
							<option value="TUNAI">TUNAI</option>
							<option value="CREDIT">CREDIT</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Barang</td>
					<td>
						<select name="barang_id">
							<option value="">-----Pilih-----</option>
							<?php
							while ($databarang=mysqli_fetch_array($resultbarang))
							{
								echo "<option value=$databarang[id_barang]>$databarang[nama_barang]</option>";
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Member</td>
					<td>
						<select name="member_id" id="member_id">
							<option value="">-----Pilih-----</option>
							<?php
							while ($datamember=mysqli_fetch_array($resultmember))
							{
								echo "<option value=$datamember[id_member]>$datamember[nama_member]</option>";
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Diskon Member</td>
							
							<td><input type="number" name="diskon_member" value="<?php echo $datamember["diskon"]; ?>"></td>
							<?php
							
							?>
				</tr>
				<tr>
					<td>Diskon Barang</td>
					<td><input type="number" name="diskon_barang"></td>
				</tr>
				<tr>
					<td>Total Pembelian</td>
					<td><input type="number" name="total_pembelian"></td>
				</tr>
				<tr>
					<td>Total Diskon</td>
					<td><input type="number" name="total_diskon"></td>
				</tr>
				<tr>
					<td>Jumlah Transaksi</td>
					<td><input type="number" name="jumlah_transaksi"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="save"></td>
				</tr>
			</table>
		</form>

		
	</body>
</html>