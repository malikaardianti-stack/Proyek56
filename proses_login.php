<?php
session_start();
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: login.php");
    exit;
}

$username = trim($_POST["username"] ?? "");
$password = $_POST["password"] ?? "";

if ($username === "" || $password === "") {
    header("Location: login.php?error=1");
    exit;
}

$stmt = $conn->prepare(
    "SELECT id, username, password_hash, nama_lengkap
    FROM users
    WHERE username = ?"
);

if (!$stmt) {
    die("Query gagal: " . $conn->error);
}

$stmt->bind_param("s", $username);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
$stmt->close();
$conn->close();

if ($user && password_verify($password, $user["password_hash"])) {
    session_regenerate_id(true);
    $_SESSION["user_id"] = $user["id"];
    $_SESSION["username"] = $user["username"];
    $_SESSION["nama_lengkap"] = $user["nama_lengkap"];

    header("Location: dashboard.php");
    exit;
}

header("Location: login.php?error=1");
exit;
