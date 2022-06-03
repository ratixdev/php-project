<?php

include("koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['simpan'])){
	
	// ambil data dari formulir
	$iddosen = $_POST['iddosen'];
	$namadosen = $_POST['namadosen'];
	$tanggallahir = $_POST['tanggallahir'];
	$tempatlahir = $_POST['tempatlahir'];
	$programstudi = $_POST['programstudi'];
    $fakultas = $_POST['fakultas'];
    $alamatrumah = $_POST['alamatrumah'];
	
	// buat query update
	$sql = "UPDATE dosen SET iddosen='$iddosen', namadosen='$namadosen', tanggallahir='$tanggallahir', tempatlahir='$tempatlahir', programstudi='$programstudi', fakultas='$fakultas', alamatrumah='$alamatrumah' WHERE iddosen=$iddosen";
	$query = mysqli_query($db, $sql);
	
	// apakah query update berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman list-siswa.php
		header('Location: lihat-dosen.php');
	} else {
		// kalau gagal tampilkan pesan
		die("Gagal menyimpan perubahan...");
	}
	
	
} else {
	die("Akses dilarang...");
}

?>
