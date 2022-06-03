<?php include("koneksi.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar proses Bimbingan</title>
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
		<h3 style="text-align: center">Daftar Bimbingan Universitas Mulia</h3>
		<a id="tambah"href="form-daftarbimbingan.php">[+] Ajukan Bimbingan</a>
	</header>

	
	<br>
	
	<table id="form" border="1">
	<thead>
		<tr>
			<th>NIM</th>
			<th>ID dosen</th>
			<th>Uraian Bimbingan</th>
			<th>Jenis Bimbingan</th>
			<th>Tanggal Bimbingan</th>
			<th>Status Bimbingan</th>
            <th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		
		<?php
		$sql = "SELECT * FROM membimbing";
		$query = mysqli_query($db, $sql);
		
		while($bimbingan = mysqli_fetch_array($query)){
			echo "<tr>";
			
			echo "<td>".$bimbingan['nim']."</td>";
			echo "<td>".$bimbingan['iddosen']."</td>";
			echo "<td>".$bimbingan['uraianbimbingan']."</td>";
			echo "<td>".$bimbingan['jenisbimbingan']."</td>";
			echo "<td>".$bimbingan['tanggalbimbingan']."</td>";
			echo "<td>".$bimbingan['statusbimbingan']."</td>";
			
            echo "<td>";
			echo "<a href='form-editbimbingan.php?nim=".$bimbingan['nim']."'>Edit</a> | ";
			echo "<a href='hapus-bimbingan.php?nim=".$bimbingan['nim']."'>Hapus</a>";
			echo "</td>";
	
			echo "</tr>";
		}		
		?>
		
	</tbody>
	</table>
	
	<p style="text-align: center">Total bimbingan: <?php echo mysqli_num_rows($query) ?> Mahasiswa</p>
	
	</body>
</html>
