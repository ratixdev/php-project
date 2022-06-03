<!DOCTYPE html>
<html>
<head>
	<title>Website Aplikasi Bimbingan</title>
</head>
<style>
    #form {
      width: 700px;
      height: 400px;
      border: solid 0.1px black;
      text-align: center;
    }
    ul {
        list-style-type: none;
        padding: 0;
        overflow: hidden;
        background-color: #333;
        text-align:center;
    }
    li {
        float: left;
        
    }
    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }
    li a:hover {
        background-color: #111;
        text-align: center;
    }
  </style>
  <body>
    <form id="form" style="margin-left: auto; margin-right: auto">
      <h2 style="text-align: center">Aplikasi Bimbingan Dosen dan Mahasiswa</h2>

<body>
	<header>
		<h3>Selamat Datang Dosen</h3>
	</header>
	
	<h4>Pilih menu yang disediakan</h4>
	
    <nav>
		<ul>
            <li><a href="index.php">Beranda</a></li>
            <li><a href="form-daftardosen.php">Register Dosen</a></li>
            <li><a href="lihat-dosen.php">Lihat Dosen</a></li>
			<li><a href="acc-bimbingan.php">Pendaftar Bimbingan</a></li>
            <li><a href="lihat-mahasiswa.php">Lihat Mahasiswa</a></li>
		</ul>
	</nav>
	
    <?php if(isset($_GET['status'])): ?>
	<p>
		<?php
			if($_GET['status'] == 'sukses'){
				echo "Pendaftaran siswa baru berhasil!";
			} else {
				echo "Pendaftaran gagal!";
			}
		?>
	</p>
	<?php endif; ?>

	</body>
</html>
