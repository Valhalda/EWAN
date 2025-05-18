<?php
include '../config/koneksi.php';

$id = $_GET['id'];

// Cek apakah komputer ini sudah digunakan di ruangan atau di pemeliharaan
$cekPemakaian = $conn->query("SELECT * FROM tpemeliharaan WHERE id_komputer = '$id'");
$cekRuangan = $conn->query("SELECT * FROM truangan WHERE id_ruangan = '$id'"); // Jika relasi langsung ada

if ($cekPemakaian->num_rows > 0 || $cekRuangan->num_rows > 0) {
    echo "<script>alert('Komputer tidak dapat dihapus karena sudah digunakan di pemeliharaan atau ruangan.'); window.location='index.php';</script>";
    exit;
}

// Aman untuk dihapus
$conn->query("DELETE FROM tkomputer WHERE id_komputer = '$id'");
header("Location: index.php");
?>
