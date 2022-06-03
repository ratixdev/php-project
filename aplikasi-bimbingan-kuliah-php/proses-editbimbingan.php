<?php

include("koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['simpan'])){
	
	// ambil data dari formulir
	$nim = $_POST['nim'];
	$iddosen = $_POST['iddosen'];
	$uraianbimbingan = $_POST['uraianbimbingan'];
	$jenisbimbingan = $_POST['jenisbimbingan'];
	$tanggalbimbingan = $_POST['tanggalbimbingan'];
    $statusbimbingan = $_POST['statusbimbingan'];
	
	// buat query update
	$sql = "UPDATE membimbing SET nim='$nim', iddosen='$iddosen', uraianbimbingan='$uraianbimbingan', jenisbimbingan='$jenisbimbingan', tanggalbimbingan='$tanggalbimbingan', statusbimbingan='$statusbimbingan' WHERE nim=$nim";
	$query = mysqli_query($db, $sql);
	
	// apakah query update berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman list-siswa.php
		header('Location: acc-bimbingan.php');
	} else {
		// kalau gagal tampilkan pesan
		die("Gagal menyimpan perubahan...");
	}
	
	
} else {
	die("Akses dilarang...");
}

?>
