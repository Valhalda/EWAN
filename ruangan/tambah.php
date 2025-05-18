<?php
include '../config/koneksi.php';
include '../template/header.php';
include '../template/navbar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama_ruangan'];
    $lantai = $_POST['lantai'];

    mysqli_query($conn, "INSERT INTO truangan (nama_ruangan, lantai) VALUES ('$nama', '$lantai')");
    header('Location: index.php');
}
?>

<div class="container mt-4">
    <h3>Tambah Ruangan</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Nama Ruangan</label>
            <input type="text" name="nama_ruangan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Lantai</label>
            <input type="text" name="lantai" class="form-control" required>
        </div>
        <button class="btn btn-success" type="submit">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>