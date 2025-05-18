<?php
session_start();
$_SESSION['title'] = 'Data Pemeliharaan'; // Set title untuk halaman ini
include '../config/koneksi.php';
include '../template/navbar.php';
include '../template/header.php';

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM tuser WHERE id_user = '$id'")->fetch_assoc();
?>

<div class="container mt-4">
    <h3>Edit Pengguna</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" value="<?= $data['alamat'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" value="<?= $data['username'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password (kosongkan jika tidak ingin ganti)</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label>Hak Akses</label>
            <select name="hak" class="form-control">
                <option value="admin" <?= $data['hak'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                <option value="petugas" <?= $data['hak'] == 'petugas' ? 'selected' : '' ?>>Petugas</option>
            </select>
        </div>
        <button class="btn btn-success mb-3 mt-2" name="update">Simpan</button>
        <a href="index.php" class="btn btn-primary mb-3 mt-2">kembali</a>
    </form>
</div>

<?php
if (isset($_POST['update'])) {
    $query = "UPDATE tuser SET 
        nama = '$_POST[nama]', 
        alamat = '$_POST[alamat]',
        username = '$_POST[username]',
        hak = '$_POST[hak]'";

    if (!empty($_POST['password'])) {
        $pass = md5($_POST['password']);
        $query .= ", password = '$pass'";
    }

    $query .= " WHERE id_user = '$id'";
    $conn->query($query);
    echo "<script>alert('Pengguna diperbarui'); location='index.php';</script>";
}
?>
