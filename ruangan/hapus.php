<?php
include '../config/koneksi.php';

$id = $_GET['id'];
$conn->query("DELETE FROM truangan WHERE id_ruangan='$id'");

echo "<script>alert('Data ruangan dihapus'); location='index.php';</script>";

header('Location: index.php');