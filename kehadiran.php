<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="kehadiran.css">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <title>Logged in</title>
    <style>
        /* Supaya semua teks lebih rapi */
        body {
            font-family: Arial, sans-serif;
            background-color: #353543;
            /* tetap sesuai background kamu */
            color: white;
        }

        /* Form styling */
        .form {
            margin-bottom: 20px;
            /* kasih jarak ke tabel */
        }

        .form form {
            display: flex;
            flex-wrap: wrap;
            /* biar input bisa turun ke bawah kalau kepanjangan */
            gap: 10px;
            /* kasih jarak antar elemen */
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

        .table th,
        .table td {
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

    <?php
    require 'functions.php';
    $siswa = mysqli_query($conn, "SELECT nama FROM siswa");
    ?>

    <div class="table">
        <h4>Daftar Siswa</h4>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>

                <th>Nama</th>
            </tr>
            <?php
            $i = 1;
            $siswa = isset($siswa) ? $siswa : [];
            foreach ($siswa as $row) : ?>
                <tr>
                    <!-- <td><?= $i; ?></td> -->
                    <td><?= htmlspecialchars($row['nama']); ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach ?>
        </table>
    </div>

</body>

</html>