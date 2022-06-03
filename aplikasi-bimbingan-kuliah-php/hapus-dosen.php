<?php

include("koneksi.php");

if( isset($_GET['iddosen']) ){
	
	// ambil id dari query string
	$iddosen = $_GET['iddosen'];
	
	// buat query hapus
	$sql = "DELETE FROM dosen WHERE iddosen=$iddosen";
	$query = mysqli_query($db, $sql);
	
	// apakah query hapus berhasil?
	if( $query ){
		header('Location: lihat-dosen.php');
	} else {
		die("gagal menghapus...");
	}
	
} else {
	die("akses dilarang...");
}

?>
