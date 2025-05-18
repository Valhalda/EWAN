<?php
include '../config/koneksi.php';

$id = $_GET['id'];
$conn->query("DELETE FROM tpemeliharaan WHERE id_pemeliharaan='$id'");

echo "<script>alert('Data ruangan dihapus'); location='index.php';</script>";

header('Location: index.php');