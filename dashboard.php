<?php
require_once "auth.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Project Hub</h1>
    <p>Selamat datang, <?php echo htmlspecialchars($_SESSION["nama_lengkap"]); ?></p>
</header>

<nav>
    <a href="dashboard.php">Dashboard</a>
    <a href="index.php">Biodata</a>
    <a href="layout.php">Layout Lab</a>
    <a href="data_mahasiswa.php">Data Mahasiswa</a>
    <a href="form_mahasiswa.php">Tambah Mahasiswa</a>
    <a href="logout.php">Logout</a>
</nav>

<main>
    <section>
        <h2>Daftar Modul</h2>
        <ul>
            <li><a href="index.php">Home / Biodata</a> (Modul 1 dan 2)</li>
            <li><a href="layout.php">Layout Lab</a> (Modul 3A)</li>
            <li><a href="data_mahasiswa.php">Data Mahasiswa</a> (Modul 3B)</li>
            <li><a href="form_mahasiswa.php">Tambah Mahasiswa</a> (Modul 4B)</li>
        </ul>
    </section>
</main>

<footer>
    <p>Web Programming 1</p>
</footer>

</body>
</html>
