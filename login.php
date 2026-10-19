<?php
session_start();

if (isset($_SESSION["user_id"])) {
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Login</h1>
    <p>Web Programming 1</p>
</header>

<main>
    <section>
        <h2>Masuk ke Project Hub</h2>

        <?php if (isset($_GET["error"])) { ?>
            <p class="pesan-error">Username atau password salah.</p>
        <?php } ?>
        <?php if (isset($_GET["logout"])) { ?>
            <p class="pesan-sukses">Anda berhasil logout.</p>
        <?php } ?>

        <form action="proses_login.php" method="POST" class="student-form">
            <label for="username">Username</label>
            <input id="username" name="username" type="text" required>

            <label for="password">Password</label>
            <input id="password" name="password" type="password" required>

            <button type="submit">Login</button>
        </form>
    </section>
</main>

<footer>
    <p>Web Programming 1</p>
</footer>

</body>
</html>
