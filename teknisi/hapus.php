<?php
include '../config/koneksi.php';

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM  WHERE id_ = $id");

echo "<script>alert('Data  dihapus'); location='index.php';</script>";

header('Location: .php');