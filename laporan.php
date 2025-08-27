<?php
require 'functions.php';
$siswa = mysqli_query($conn, "SELECT * FROM siswa");

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "<script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'laporan.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambahkan!');
            document.location.href = 'laporan.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="laporan.css">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <title>Logged in</title>
    <style>
        /* Supaya semua teks lebih rapi */
body {
    font-family: Arial, sans-serif;
    background-color: #353543; /* tetap sesuai background kamu */
    color: white;
}

/* Form styling */
.form {
    margin-bottom: 20px; /* kasih jarak ke tabel */
}

.form form {
    display: flex;
    flex-wrap: wrap;  /* biar input bisa turun ke bawah kalau kepanjangan */
    gap: 10px;        /* kasih jarak antar elemen */
    align-items: center;
}

.form label {
    margin-right: 5px;
}

.form input,
.form select,
.form button {
    padding: 5px 10px;
    border-radius: 5px;
    border: none;
}

/* Tombol tambah siswa */
.form button {
    background-color: #3b82f6;
    color: white;
    cursor: pointer;
}

.form button:hover {
    background-color: #2563eb;
}

/* Table styling */
.table table {
    width: 100%;
    border-collapse: collapse;
    background: #3a3a4a;
    border-radius: 8px;
    overflow: hidden;
}

.table th, .table td {
    padding: 10px;
    text-align: left;
    border: 1px solid #555;
}

.table th {
    background: #4b4b5c;
}

.table img {
    border-radius: 5px;
}

    </style>
</head>

<body>

    <div class="dashboard">
        <div class="logo">
            <h2>Dashboard</h2>
        </div>
        <ul class="main">
            <li>
                <a href="welcome.php">
                    <i class='bx  bx-home'></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="nilai.php">
                    <i class='bx  bx-bar-chart-big'></i>
                    <span>Nilai</span>
                </a>
            </li>
            <li>
                <a href="kehadiran.php">
                    <i class='bx  bx-clipboard-detail'></i>
                    <span>Kehadiran</span>
                </a>
            </li>
            <li>
                <a href="jadwal.php">
                    <i class='bx  bx-calendar-alt'></i>
                    <span>Jadwal</span>
                </a>
            </li>
            <li>
                <a href="laporan.php">
                    <i class='bx  bx-newspaper'></i>
                    <span>laporan</span>
                </a>
            </li>
            <li>
                <a href="settings.php">
                    <i class='bx  bx-gear'></i>
                    <span>Pengaturan</span>
                </a>
            </li>
            <li class="logout">
                <a href="logout.php">
                    <i class='bx  bx-arrow-out-right-square-half'></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="content">
        <div class="container">

            <h3>Laporan siswa</h3>
            <div class="form">
                <h4>Tambah siswa baru</h4>
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" required>
                    <label for="nim">NIS:</label>
                    <input type="text" id="nim" name="nim" required>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="jurusan">Jurusan:</label>
                    <select name="jurusan" id="jurusan" required>
                        <option value="">Pilih jurusan</option>
                        <option value="Teknik informatika">Teknik informatika</option>
                        <option value="sistem informasi">Sistem informasi</option>
                    </select>

                    <label for="gambar">Gambar Profil:</label>
                    <input type="file" id="gambar" name="gambar" accept="image/*">

                    <button type="submit" name="submit">Tambah siswa</button>
                </form>
            </div>

            <div class="table">
                <h4>Daftar Siswa</h4>
                <table border="1" cellpadding="10" cellspacing="0">
                    <tr>
                        <th>No.</th>
                        <th>Aksi</th>
                        <th>Gambar</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jurusan</th>
                    </tr>
                    <?php
                    $i = 1;
                    $siswa = isset($siswa) ? $siswa : [];
                    foreach ($siswa as $row) : ?>
                        <tr>

                            <td><?= $i; ?></td>
                            <td>
                                <a href="update.php?id=<?= $row['id']; ?>">Ubah</a>
                                <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </td>
                            <td><img src="image/<?= htmlspecialchars($row['gambar']); ?>" width="50"></td>
                            <td><?= htmlspecialchars($row['nim']); ?></td>
                            <td><?= htmlspecialchars($row['nama']); ?></td>
                            <td><?= htmlspecialchars($row['email']); ?></td>
                            <td><?= htmlspecialchars($row['jurusan']); ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>