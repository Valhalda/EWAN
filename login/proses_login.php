<?php
session_start();
include '../config/koneksi.php';

$user = $_POST['user'];
$pass = md5($_POST['password']);

$sql = "SELECT * FROM tuser WHERE username='$user' AND password='$pass'";
$query = $conn->query($sql);

if ($query->num_rows == 1) {
    $_SESSION['user'] = $query->fetch_assoc();
    header("Location: ../home/dashboard.php");
} else {
    echo "<script>alert('Login gagal'); window.location='../index.php';</script>";
}
?>
