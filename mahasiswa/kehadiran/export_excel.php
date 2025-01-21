<?php
include '../../config/koneksi.php';
$nim = $_SESSION['nim'];

$query2 = "SELECT matakuliah.no_matakuliah, matakuliah.nama_matakuliah, COUNT(kehadiran.id_kehadiran) AS jumlah_kehadiran 
            FROM matakuliah 
            JOIN kehadiran ON kehadiran.no_matakuliah = matakuliah.no_matakuliah 
            JOIN buatqr ON kehadiran.id_qrcode = buatqr.id_qrcode 
            WHERE kehadiran.nim = '10121116' 
            GROUP BY matakuliah.no_matakuliah, matakuliah.nama_matakuliah 
            ORDER BY matakuliah.no_matakuliah";
$sql2 = mysqli_query($koneksi, $query2);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Export Data Ke Excel Dengan PHP</title>
</head>
<body>
	<style type="text/css">
		body{
			font-family: sans-serif;
		}
		table{
			margin: 20px auto;
			border-collapse: collapse;
		}
		table th,
		table td{
			border: 1px solid #3c3c3c;
			padding: 8px;
		}
	</style>
 
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data_Matakuliah.xls");
	?>
 
	<center>
		<h1>Export Data Matakuliah ke Excel</h1>
	</center>
 
	<table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Nomor Matakuliah</th>
				<th>Nama Matakuliah</th>
				<th>Jumlah Kehadiran</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			while($row = mysqli_fetch_array($sql2)){
				echo '<tr>';
				echo '<td>' . $no++ . '</td>';
				echo '<td>' . $row['no_matakuliah'] . '</td>';
				echo '<td>' . $row['nama_matakuliah'] . '</td>';
				echo '<td>' . $row['jumlah_kehadiran'] . '</td>';
				echo '</tr>';
			}
			?>
		</tbody>
	</table>
</body>
</html>
