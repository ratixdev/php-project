<!DOCTYPE html>
<html>
<head>
	<title>Formulir Pendaftaran Bimbingan</title>
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
		<h3>Formulir Pendaftaran Bimbingan</h3>
	</header>
	
	<form id=form action="proses-daftarbimbingan.php" method="POST">
		
		<fieldset>

      <p>
        <label for="nim">Nim: </label>
			<input id=kanan type="text" name="nim" placeholder="masukkan nim anda" />
    </p>
    <p>
        <label for="iddosen">ID Dosen: </label>
			<input id=kanan type="text" name="iddosen" placeholder="masukkan ID dosen anda" />
    </p>
    <p>
        <label for="uraianbimbingan">Uraian Bimbingan: </label>
			<input id=kanan type="text" name="uraianbimbingan" placeholder="Uraikan Bimbingan anda" >
    </p>
    <p>
        <label for="jenisbimbingan">Jenis Bimbingan: </label>
			<input id=kanan type="text" name="jenisbimbingan" placeholder="jenis bimbingan anda" />
    </p>
    <p>
        <label for="tanggalbimbingan">Tanggal Bimbingan: </label>
			<input id=kanan type="date" name="tanggalbimbingan" />
    </p>
        <p>
			<input type="submit" value="Register" name="daftar" />
		</p>

		</fieldset>
	
	</form>
	
	</body>
</html>
