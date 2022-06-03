<?php

include("koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){
	
	// ambil data dari formulir
	$iddosen = $_POST['iddosen'];
	$namadosen = $_POST['namadosen'];
	$tanggallahir = $_POST['tanggallahir'];
	$tempatlahir = $_POST['tempatlahir'];
	$programstudi = $_POST['programstudi'];
    $fakultas = $_POST['fakultas'];
    $alamatrumah = $_POST['alamatrumah'];
	
	// buat query
	$sql = "INSERT INTO dosen (iddosen, namadosen, tanggallahir, tempatlahir, programstudi, fakultas, alamatrumah) VALUES ('$iddosen','$namadosen','$tanggallahir','$tempatlahir','$programstudi','$fakultas','$alamatrumah')";
	$query = mysqli_query($db, $sql);
	
	// apakah query simpan berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		header('Location: lihat-dosen.php?status=sukses');
	} else {
		// kalau gagal alihkan ke halaman indek.ph dengan status=gagal
		header('Location: form-dosen.php?status=gagal');
	}
	
	
} else {
	die("Akses dilarang...");
}

?>
