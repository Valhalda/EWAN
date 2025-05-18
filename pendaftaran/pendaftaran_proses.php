<?php
include '../config/koneksi.php';

$nama     = $_POST['nama'];
$alamat   = $_POST['alamat'];
$user     = $_POST['user'];
$password = md5($_POST['password']);
$hak      = 'petugas'; // default hak akses

// Cek apakah username sudah dipakai
$cek = $conn->query("SELECT * FROM tuser WHERE username='$user'");
if ($cek->num_rows > 0) {
    echo "<script>alert('Username sudah dipakai!'); window.location='pendaftaran.php';</script>";
    exit;
}

// Simpan ke database
$sql = "INSERT INTO tuser (nama, alamat, username, password, hak) 
        VALUES ('$nama', '$alamat', '$user', '$password', '$hak')";

if ($conn->query($sql)) {
    echo "<script>alert('Pendaftaran berhasil, silakan login'); window.location='../index.php';</script>";
} else {
    echo "Gagal mendaftar: " . $conn->error;
}
?>
