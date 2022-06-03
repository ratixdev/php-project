<!DOCTYPE html>
<html>
<head>
	<title>Formulir Register Mahasiswa</title>
</head>
<style>
    #form {
      width: 600px;
      border: solid 0.1px black;
      margin-left: auto; 
      margin-right: auto;
      text-align:right;
    }
    #kanan {
        margin-right: 150px;
    }
    
  </style>

<body>
	<header style="margin-left: 650px">
		<h3>Formulir Register Mahasiswa</h3>
	</header>
	
	<form action="proses-daftarmahasiswa.php" method="POST" id=form >
		
		<fieldset>

        <p>
            <label for="nim">NIM: </label>
			<input id=kanan type="text" name="nim" placeholder="masukkan NIM anda" />
		</p>
        <p>
            <label for="nama">Nama: </label>
			<input id=kanan type="text" name="nama" placeholder="masukkan nama anda" />
		</p>
        <p>
            <label for="programstudi">Program Studi: </label>
			<input id=kanan type="text" name="programstudi" placeholder="masukkan prodi anda" />
		</p>
        <p>
            <label for="tempatlahir">Tempat Lahir: </label>
			<input id=kanan type="text" name="tempatlahir" placeholder="masukkan kota anda lahir" />
		</p>
        <p>
            <label for="tanggallahir">Tanggal Lahir: </label>
			<input id=kanan type="date" name="tanggallahir" />
		</p>
        <p>
            <label for="jeniskelamin">Jenis kelamin: </label>
			<input id=kanan type="text" name="jeniskelamin" placeholder="contoh L/P" />
		</p>
        <p>
            <label for="agama">Agama: </label>
			<input id=kanan type="text" name="agama" placeholder="masukkan agama anda" />
		</p>
        <p>
            <label for="alamat">Alamat: </label>
			<input id=kanan type="text" name="alamat" placeholder="masukkan alamat anda" />
		</p>
        <p>
            <label for="kota">Kota: </label>
			<input id=kanan type="text" name="kota" placeholder="masukkan kota anda" />
		</p>
        <p>
            <label for="provinsi">Provinsi: </label>
			<input id=kanan type="text" name="provinsi" placeholder="masukkan Provinsi anda" />
		</p>
        <p>
			<input type="submit" value="Daftar" name="daftar" />
		</p>

		</fieldset>
	
	</form>
	
</body>

</html>
