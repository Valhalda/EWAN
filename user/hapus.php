<?php
include '../config/koneksi.php';
$id = $_GET['id'];
$conn->query("DELETE FROM tuser WHERE id_user = '$id'");
echo "<script>alert('Pengguna dihapus!'); location='index.php';</script>";
?>