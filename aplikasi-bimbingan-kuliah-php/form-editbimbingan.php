<?php 

include("koneksi.php");

if( !isset($_GET['nim']) ){
	// kalau tidak ada id di query string
	header('Location: acc-bimbingan.php');
}

//ambil id dari query string
$nim = $_GET['nim'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM membimbing WHERE nim=$nim";
$query = mysqli_query($db, $sql);
$bimbingan = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
	die("data tidak ditemukan di database...");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulir Edit Bimbingan</title>
</head>

<body>
	<header>
		<h3>Hanya dosen yang dapat edit Bimbingan</h3>
	</header>
	
<form action="proses-editbimbingan.php" method="POST">
		
	<fieldset>
        <p>
        <label for="nim">Nim: </label>
		<input id=kanan type="text" name="nim" placeholder="masukkan nim anda" value="<?php echo $bimbingan['nim']?>" />
        </p>
        
        <p>
        <label for="iddosen">ID Dosen: </label>
		<input id=kanan type="text" name="iddosen" placeholder="masukkan ID dosen anda" value="<?php echo $bimbingan['iddosen']?>" />
        </p>
        <p>
        <label for="uraianbimbingan">Uraian Bimbingan: </label>
		<input id=kanan type="text" name="uraianbimbingan" placeholder="Uraikan Bimbingan anda" value="<?php echo $bimbingan['uraianbimbingan']?>"/>
        </p>
        <p>
        <label for="jenisbimbingan">Jenis Bimbingan: </label>
		<input id=kanan type="text" name="jenisbimbingan" placeholder="jenis bimbingan anda" value="<?php echo $bimbingan['jenisbimbingan']?>"/>
        </p>
        <p>
        <label for="tanggalbimbingan">Tanggal Bimbingan: </label>
		<input id=kanan type="date" name="tanggalbimbingan" value="<?php echo $bimbingan['tanggalbimbingan']?>" />
        </p>
        <p>
        <label for="statusbimbingan">Status Bimbingan: </label>
		<input id=kanan type="text" name="statusbimbingan" value="<?php echo $bimbingan['statusbimbingan']?>" />
        </p>
        <p>
		<input type="submit" value="Simpan" name="simpan"/>
	    </p>
	</fieldset>
	
</form>
</body>
</html>
