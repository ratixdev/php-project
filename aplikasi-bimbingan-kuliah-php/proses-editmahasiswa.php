<?php

include("koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['simpan'])){
	
	// ambil data dari formulir
	$nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $programstudi = $_POST['programstudi'];
    $tempatlahir = $_POST['tempatlahir'];
    $tanggallahir = $_POST['tanggallahir'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $provinsi = $_POST['provinsi'];
	
	// buat query update
    $sql = "UPDATE mahasiswa SET nim='$nim', nama='$nama', programstudi='$programstudi', tempatlahir='$tempatlahir', tanggallahir='$tanggallahir', jeniskelamin='$jeniskelamin', agama='$agama', alamat='$alamat', kota='$kota', provinsi='$provinsi' WHERE nim=$nim";
	$query = mysqli_query($db, $sql);
	
	// apakah query update berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman list-siswa.php
		header('Location: lihat-mahasiswa.php');
	} else {
		// kalau gagal tampilkan pesan
		die("Gagal menyimpan perubahan...");
	}
	
	
} else {
	die("Akses dilarang...");
}

?>