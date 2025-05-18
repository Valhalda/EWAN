<?php
include '../config/koneksi.php';
include '../template/header.php';
include '../template/navbar.php';

if (isset($_POST['simpan'])) {
    $conn->query("INSERT INTO tteknisi (nama_teknisi, telpon, email, alamat) VALUES (
        '$_POST[nama_teknisi]', '$_POST[telpon]', '$_POST[email]', '$_POST[alamat]'
    )");
    echo "<script>alert('Data teknisi ditambahkan!'); location='index.php';</script>";
}
?>

<div class="container mt-4">
    <h3>Tambah Teknisi</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Nama Teknisi</label>
            <input type="text" name="nama_teknisi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="telpon" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control"></textarea>
        </div>
        <button class="btn btn-primary" name="simpan">Simpan</button>
    </form>
</div>
