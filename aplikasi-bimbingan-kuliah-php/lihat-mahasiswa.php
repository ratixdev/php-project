<?php include("koneksi.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Mahasiswa Bimbingan</title>
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
		<h3 style="text-align: center">Daftar mahasiswa yang mendaftar bimbingan</h3>
		<a id="tambah"href="form-daftarmahasiswa.php">[+] Tambah Baru</a>
	</header>

	
	<br>
	
	<table id="form" border="1">
	<thead>
		<tr>
			<th>NIM</th>
			<th>Nama Mahasiswa</th>
			<th>Program Studi</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Alamat</th>
            <th>Kota</th>
            <th>Provinsi</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		
		<?php
		$sql = "SELECT * FROM mahasiswa";
		$query = mysqli_query($db, $sql);
		
		while($mahasiswa = mysqli_fetch_array($query)){
			echo "<tr>";
			
			echo "<td>".$mahasiswa['nim']."</td>";
			echo "<td>".$mahasiswa['nama']."</td>";
            echo "<td>".$mahasiswa['programstudi']."</td>";
            echo "<td>".$mahasiswa['tempatlahir']."</td>";
            echo "<td>".$mahasiswa['tanggallahir']."</td>";
            echo "<td>".$mahasiswa['jeniskelamin']."</td>";
            echo "<td>".$mahasiswa['agama']."</td>";
            echo "<td>".$mahasiswa['alamat']."</td>";
            echo "<td>".$mahasiswa['kota']."</td>";
            echo "<td>".$mahasiswa['provinsi']."</td>";

			echo "<td>";
			echo "<a href='form-editmahasiswa.php?nim=".$mahasiswa['nim']."'>Edit</a> | ";
			echo "<a href='hapus-mahasiswa.php?nim=".$mahasiswa['nim']."'>Hapus</a>";
			echo "</td>";
			
			echo "</tr>";
		}		
		?>
		
	</tbody>
	</table>
	
	<p style="text-align: center">Total Mahasiswa: <?php echo mysqli_num_rows($query) ?> orang</p>
	
	</body>
</html>
