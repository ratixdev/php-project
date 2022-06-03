<?php 

include("koneksi.php");

if( !isset($_GET['iddosen']) ){
	// kalau tidak ada id di query string
	header('Location: lihat-dosen.php');
}

//ambil id dari query string
$iddosen = $_GET['iddosen'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM dosen WHERE iddosen=$iddosen";
$query = mysqli_query($db, $sql);
$dosen = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
	die("data tidak ditemukan di database...");
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Formulir Edit Dosen</title>
</head>

<body>
	<header>
		<h3>Form Edit Dosen</h3>
	</header>
	
	<form action="proses-editdosen.php" method="POST">
        
    <fieldset>

        <p>
            <label for="iddosen">NIDN: </label>
			<input id=kanan type="text" name="iddosen" placeholder="masukkan NIDN anda" value="<?php echo $dosen['iddosen'] ?>"/>
		</p>
        <p>
            <label for="namadosen">Nama Dosen: </label>
			<input type="text" name="namadosen" placeholder="nama dosen" value="<?php echo $dosen['namadosen'] ?>" />
		</p>
        <p>
            <label for="tanggallahir">Tanggal Lahir: </label>
			<input id=kanan type="date" name="tanggallahir" value="<?php echo $dosen['tanggallahir'] ?>" />
		</p>
        <p>
            <label for="tempatlahir">Tempat Lahir: </label>
			<input id=kanan type="text" name="tempatlahir" placeholder="kota anda lahir" value="<?php echo $dosen['tempatlahir']?>"/>
		</p>
        <p>
            <label for="programstudi">Program Studi: </label>
			<input id=kanan type="text" name="programstudi" placeholder="isi program studi anda" value="<?php echo $dosen['programstudi']?>"/>
		</p>
        <p>
            <label for="fakultas">Fakultas: </label>
			<input id=kanan type="text" name="fakultas" placeholder="masukkan fakultas anda" value="<?php echo $dosen['fakultas']?>"/>
		</p>
        <p>
            <label for="alamatrumah">Alamat Rumah: </label>
			<input id=kanan type="text" name="alamatrumah" placeholder="masukkan alamat rumah anda" value="<?php echo $dosen['alamatrumah']?>"/>
		</p>
		
		<p>
			<input type="submit" value="Simpan" name="simpan" />
		</p>
		
		</fieldset>
		
	</form>
	
</body>
</html>
