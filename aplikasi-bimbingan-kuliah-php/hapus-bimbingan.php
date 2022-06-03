<?php

include("koneksi.php");

if( isset($_GET['nim']) ){
	
	// ambil id dari query string
	$nim = $_GET['nim'];
	
	// buat query hapus
	$sql = "DELETE FROM membimbing WHERE nim=$nim";
	$query = mysqli_query($db, $sql);
	
	// apakah query hapus berhasil?
	if( $query ){
		header('Location: acc-bimbingan.php');
	} else {
		die("gagal menghapus...");
	}
	
} else {
	die("akses dilarang...");
}

?>
