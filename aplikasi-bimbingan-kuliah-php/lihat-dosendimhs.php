<?php include("koneksi.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Dosen pembimbing</title>
</head>
<style>
    #form {
      width: auto;
      border: solid 0.1px black;
      margin-left: auto; 
      margin-right: auto;
      text-align:center;
    }
	#tambah {
		margin-left: 430px;
	}
    
  </style>

<body>
	<header>
		<h3 style="text-align: center">Daftar dosen yang sudah terdaftar</h3>
	</header>

	
	<br>
	
	<table id="form" border="1">
	<thead>
		<tr>
			<th>Id dosen</th>
			<th>Nama dosen</th>
			<th>Tanggal Lahir</th>
			<th>Tempat lahir</th>
			<th>Program studi</th>
			<th>Fakultas</th>
            <th>Alamat rumah</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		
		<?php
		$sql = "SELECT * FROM dosen";
		$query = mysqli_query($db, $sql);
		
		while($dosen = mysqli_fetch_array($query)){
			echo "<tr>";
			
			echo "<td>".$dosen['iddosen']."</td>";
			echo "<td>".$dosen['namadosen']."</td>";
			echo "<td>".$dosen['tanggallahir']."</td>";
			echo "<td>".$dosen['tempatlahir']."</td>";
			echo "<td>".$dosen['programstudi']."</td>";
			echo "<td>".$dosen['fakultas']."</td>";
            echo "<td>".$dosen['alamatrumah']."</td>";

            echo "<td>";
			echo "<a href='form-daftarbimbingan.php'>Ajukan Bimbingan</a> | ";
			
			echo "</tr>";
		}		
		?>
		
	</tbody>
	</table>
	
	<p style="text-align: center">Total dosen: <?php echo mysqli_num_rows($query) ?> orang</p>
	
	</body>
</html>
