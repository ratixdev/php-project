<?php

include("koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){
	
	// ambil data dari formulir
	$nim = $_POST['nim'];
	$iddosen = $_POST['iddosen'];
	$uraianbimbingan = $_POST['uraianbimbingan'];
	$jenisbimbingan = $_POST['jenisbimbingan'];
	$tanggalbimbingan = $_POST['tanggalbimbingan'];
	
	// buat query
	$sql = "INSERT INTO membimbing (nim,iddosen,uraianbimbingan,jenisbimbingan,tanggalbimbingan, statusbimbingan) VALUE ('$nim','$iddosen','$uraianbimbingan','$jenisbimbingan','$tanggalbimbingan','Belum acc')";
	$query = mysqli_query($db, $sql);
	
	// apakah query simpan berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		header('Location: lihat-bimbingan.php?status=sukses');
	} else {
		// kalau gagal alihkan ke halaman indek.ph dengan status=gagal
		header('Location: form-daftarbimbingan.php?status=gagal');
	}
	
	
} else {
	die("Akses dilarang...");
}

?>
