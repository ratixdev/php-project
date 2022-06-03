<!DOCTYPE html>
<html>
<head>
	<title>Formulir Register Dosen</title>
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
		<h3>Formulir Register Dosen</h3>
	</header>
	
	<form action="proses-daftardosen.php" method="POST" id=form >
		
		<fieldset>

        <p>
            <label for="iddosen">NIDN: </label>
			<input id=kanan type="text" name="iddosen" placeholder="masukkan NIDN anda" />
		</p>
        <p>
            <label for="namadosen">Nama Dosen: </label>
			<input id=kanan type="text" name="namadosen" placeholder="masukkan nama anda" />
		</p>
        <p>
            <label for="tanggallahir">Tanggal Lahir: </label>
			<input id=kanan type="date" name="tanggallahir" />
		</p>
        <p>
            <label for="tempatlahir">Tempat Lahir: </label>
			<input id=kanan type="text" name="tempatlahir" placeholder="kota anda lahir" />
		</p>
        <p>
            <label for="programstudi">Program Studi: </label>
			<input id=kanan type="text" name="programstudi" placeholder="isi program studi anda" />
		</p>
        <p>
            <label for="fakultas">Fakultas: </label>
			<input id=kanan type="text" name="fakultas" placeholder="masukkan fakultas anda" />
		</p>
        <p>
            <label for="alamatrumah">Alamat Rumah: </label>
			<input id=kanan type="text" name="alamatrumah" placeholder="masukkan alamat rumah anda" />
		</p>
        <p>
			<input type="submit" value="Daftar" name="daftar" />
		</p>

		</fieldset>
	
	</form>
	
	</body>
</html>
