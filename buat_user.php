<?php
// Jalankan sekali lewat browser: http://localhost/web-programming-session4/buat_user.php
require "koneksi.php";

$username = "admin";
$password = "admin123";
$nama_lengkap = "Ardianti Malika Putri";

$cek = $conn->prepare("SELECT id FROM users WHERE username = ?");
$cek->bind_param("s", $username);
$cek->execute();
$cek->store_result();

if ($cek->num_rows > 0) {
    die("User '$username' sudah ada, tidak dibuat ulang.");
}
$cek->close();

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare(
    "INSERT INTO users (username, password_hash, nama_lengkap) VALUES (?, ?, ?)"
);
$stmt->bind_param("sss", $username, $hash, $nama_lengkap);

if (!$stmt->execute()) {
    die("Gagal membuat user: " . $stmt->error);
}

echo "User '$username' berhasil dibuat. Hash: " . htmlspecialchars($hash);

$stmt->close();
$conn->close();
