<?php
session_start();

// Koneksi database
$host     = "localhost";
$dbname   = "rpl-vote";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah option_id dikirim
if (!isset($_GET['option_id']) || !is_numeric($_GET['option_id'])) {
    header("Location: kandidat.php");
    exit;
}

$option_id = (int) $_GET['option_id'];

// Ambil voting_event_id dari option
$opt = $conn->query("SELECT voting_event_id FROM options WHERE id = $option_id");
if ($opt->num_rows === 0) {
    die("Kandidat tidak ditemukan.");
}
$row = $opt->fetch_assoc();
$voting_event_id = $row['voting_event_id'];

// Ambil user_id dari session
$user_id = isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : 0;

// Kalau tidak ada session, redirect ke login
if ($user_id === 0) {
    header("Location: index.php");
    exit;
}

// Cek apakah user sudah pernah vote di event ini
$cek = $conn->query("SELECT id FROM votes WHERE user_id = $user_id AND voting_event_id = $voting_event_id");
if ($cek->num_rows > 0) {
    // Sudah pernah vote - redirect ke halaman sudah vote
    header("Location: voting-disimpan.php?status=sudah");
    $conn->close();
    exit;
}

// Simpan vote ke database
$insert = $conn->query("
    INSERT INTO votes (user_id, voting_event_id, option_id, created_at)
    VALUES ($user_id, $voting_event_id, $option_id, NOW())
");

$conn->close();

if ($insert) {
    header("Location: voting-disimpan.php?status=sukses");
} else {
    header("Location: voting-disimpan.php?status=gagal");
}
exit;
?>