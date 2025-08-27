<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: Login.php");
    exit;
}

$username = $_SESSION['user'];
$page = $_GET['page'] ?? 'home';
?>

<?php
require 'functions.php';
$siswa = mysqli_query($conn, "SELECT * FROM siswa");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="welkam.css">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <title>Logged in</title>
</head>

<body>
    <div class="dashboard">
        <div class="logo">
            <h2>Dashboard</h2>
        </div>
            <ul class="main">
                <li>
                    <a href="welcome.php">
                        <i class='bx  bx-home'  ></i> 
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="nilai.php">
                        <i class='bx  bx-bar-chart-big'  ></i> 
                        <span>Nilai</span>
                    </a>
                </li>
                <li>
                    <a href="kehadiran.php">
                        <i class='bx  bx-clipboard-detail'  ></i> 
                        <span>Kehadiran</span>
                    </a>
                </li>
                <li>
                    <a href="jadwal.php">
                        <i class='bx  bx-calendar-alt'  ></i> 
                        <span>Jadwal</span>
                    </a>
                </li>
                <li>
                    <a href="laporan.php">
                        <i class='bx  bx-newspaper'  ></i>
                        <span>laporan</span>
                    </a>
                </li>
                <li>
                    <a href="settings.php">
                        <i class='bx  bx-gear'  ></i>
                        <span>Pengaturan</span>
                    </a>
                </li>
                <li class="logout">
                    <a href="logout.php">
                        <i class='bx  bx-arrow-out-right-square-half'  ></i> 
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
    </div>

    <div class="content">
        <h1>Selamat datang, <?php echo htmlspecialchars($username); ?>!</h1>
        <p>Di page ini berisi semua uji coba praktek dari Ustadz Rajie. Mulai dari tabel, form, settings, dll.</p>
    </div>
</body>

</html>