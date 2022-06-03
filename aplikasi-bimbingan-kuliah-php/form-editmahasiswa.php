<?php 

include("koneksi.php");

if( !isset($_GET['nim']) ){
	// kalau tidak ada id di query string
	header('Location: lihat-mahasiswa.php');
}

//ambil id dari query string
$nim = $_GET['nim'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM mahasiswa WHERE nim=$nim";
$query = mysqli_query($db, $sql);
$mahasiswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
	die("data tidak ditemukan di database...");
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Formulir Edit Mahasiswa</title>
</head>

<body>
	<header>
		<h3>Form Edit Mahasiswa</h3>
	</header>
	
	<form action="proses-editmahasiswa.php" method="POST">
    
    <fieldset>

        <p>
            <label for="nim">NIM: </label>
			<input id=kanan type="text" name="nim" placeholder="masukkan NIM anda" value="<?php echo $mahasiswa['nim'] ?>"/>
		</p>
        <p>
            <label for="nama">Nama: </label>
			<input id=kanan type="text" name="nama" placeholder="masukkan nama anda" value="<?php echo $mahasiswa['nama'] ?>" />
		</p>
        <p>
            <label for="programstudi">Program Studi: </label>
			<input id=kanan type="text" name="programstudi" placeholder="masukkan prodi anda" value="<?php echo $mahasiswa['programstudi'] ?>"/>
		</p>
        <p>
            <label for="tempatlahir">Tempat Lahir: </label>
			<input id=kanan type="text" name="tempatlahir" placeholder="masukkan kota anda lahir" value="<?php echo $mahasiswa['tempatlahir'] ?>"/>
		</p>
        <p>
            <label for="tanggallahir">Tanggal Lahir: </label>
			<input id=kanan type="date" name="tanggallahir" value="<?php echo $mahasiswa['tanggallahir'] ?>"/>
		</p>
        <p>
            <label for="jeniskelamin">Jenis kelamin: </label>
			<input id=kanan type="text" name="jeniskelamin" placeholder="contoh L/P" value="<?php echo $mahasiswa['jeniskelamin'] ?>"/>
		</p>
        <p>
            <label for="agama">Agama: </label>
			<input id=kanan type="text" name="agama" placeholder="masukkan agama anda" value="<?php echo $mahasiswa['agama'] ?>"/>
		</p>
        <p>
            <label for="alamat">Alamat: </label>
			<input id=kanan type="text" name="alamat" placeholder="masukkan alamat anda" value="<?php echo $mahasiswa['alamat'] ?>"/>
		</p>
        <p>
            <label for="kota">Kota: </label>
			<input id=kanan type="text" name="kota" placeholder="masukkan kota anda" value="<?php echo $mahasiswa['kota'] ?>"/>
		</p>
        <p>
            <label for="provinsi">Provinsi: </label>
			<input id=kanan type="text" name="provinsi" placeholder="masukkan Provinsi anda" value="<?php echo $mahasiswa['provinsi'] ?>"/>
		</p>
        <p>
			<input type="submit" value="Simpan" name="simpan" />
		</p>

		</fieldset>
	
	</form>