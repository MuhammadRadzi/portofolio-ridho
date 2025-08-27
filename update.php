<?php
require 'functions.php';
// ambil data URL
$id = $_GET["id"];

// query data siswa berdasarkan id
$ubahDB = query("SELECT * FROM siswa WHERE id = $id")[0];

// mengechek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
	//mengechek apakah data berhasil di diubah atau tidak
	if (update($_POST) > 0) {
		echo "<script>
			alert('data berhasil DIUPDATE!!!'); document.location.href = 'index.php'; 
		</script>";
	} else {
		echo "<script>
			alert('data GAGAL DIUPDATE!!!'); document.location.href = 'index.php';
		</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Update Data Siswa</title>
</head>
<body>
	<h1>Update Data Siswa</h1>
	<form action="" method="post"></form>
	<input type="hidden" name="id" value="<?= $ubahDB["id"]; ?>">
	<ul>
		<li>
			<label for="nama">Nama :</label>
			<input type="text" name="nama" id="nama" required value="<?= $ubahDB["nama"]; ?>">
		</li>
		<li>
			<label for="nis">NIS :</label>
			<input type="text" name="nis" id="nis" required value="<?= $ubahDB["nis"]; ?>">
		</li>
		<li>
			<label for="email">Email :</label>
			<input type="email" name="email" id="email" required value="<?= $ubahDB["email"]; ?>">
		</li>
		<li>
			<label for="jurusan">Jurusan :"></label>
			<input type="text" name="jurusan" id="jurusan" required value="<?= $ubahDB["jurusan"]; ?>">
		</li>
		<li>
			<label for="gambar">Gambar :</label>
			<img src="image/" alt="">
		</li>
	</ul>
</body>
</html>