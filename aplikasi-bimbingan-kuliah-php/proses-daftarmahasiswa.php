<?php

include("koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){
	
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
	
	
	// buat query
	$sql = "INSERT INTO mahasiswa (nim,nama,programstudi,tempatlahir,tanggallahir,jeniskelamin,agama,alamat,kota,provinsi) VALUE ('$nim','$nama','$programstudi','$tempatlahir','$tanggallahir','$jeniskelamin','$agama','$alamat','$kota','$provinsi')";
	$query = mysqli_query($db, $sql);
	
	// apakah query simpan berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		header('Location: lihat-mahasiswa.php?status=sukses');
	} else {
		// kalau gagal alihkan ke halaman indek.php dengan status=gagal
		header('Location: form-daftarmahasiswa.php?status=gagal');
	}
	
	
} else {
	die("Akses dilarang...");
}

?>
