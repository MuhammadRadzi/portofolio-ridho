<?php
session_start();
// Data dummy pengguna 
$dummy_users = [
    'guru' => 'password123',
    'pesdik' => '321siswa',
    'admin' => 'admin',
    'Radzi' => 'radzikeren'
];
// Terima data dari form
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Validasi
if(isset($dummy_users[$username]) && $dummy_users[$username] === $password) {
    // Login sukses
    $_SESSION['user'] = $username;
    header("Location: welcome.php");
} else {
    // Login gagal
    header("Location: Login.php?error=1");
}
exit;