<?php 
include '../config/koneksi.php';
include '../template/header.php';
include '../template/navbar.php'; 
?>

<div class="container mt-4">
    <h3>Tambah Pengguna</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control">
        </div>
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="user" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Hak Akses</label>
            <select name="hak" class="form-control">
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
            </select>
        </div>
        <button class="btn btn-primary" name="simpan">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php
if (isset($_POST['simpan'])) {
    $pass = md5($_POST['password']); // gunakan hash untuk keamanan
    $conn->query("INSERT INTO tuser (nama, alamat, user, password, hak) VALUES (
        '$_POST[nama]', '$_POST[alamat]', '$_POST[user]', '$pass', '$_POST[hak]'
    )");
    echo "<script>alert('Pengguna ditambahkan!'); location='index.php';</script>";
}
?>