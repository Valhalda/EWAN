<?php
session_start();
$_SESSION['title'] = 'Data Pemeliharaan'; // Set title untuk halaman ini
include '../config/koneksi.php';
include '../template/navbar.php';
include '../template/header.php';

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM tteknisi WHERE id_teknisi = '$id'")->fetch_assoc();
?>

<div class="container mt-4">
    <h3>Edit Teknisi</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Nama Teknisi</label>
            <input type="text" name="nama_teknisi" value="<?= $data['nama_teknisi'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="telpon" value="<?= $data['telpon'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="<?= $data['email'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control"><?= $data['alamat'] ?></textarea>
        </div>
        <button class="btn btn-success mb-3 mt-2" name="update">Simpan</button>
        <a href="index.php" class="btn btn-primary mb-3 mt-2">kembali</a>   
    </form>
</div>

<?php
if (isset($_POST['update'])) {
    $conn->query("UPDATE tteknisi SET 
        nama_teknisi = '$_POST[nama_teknisi]',
        telpon = '$_POST[telpon]',
        email = '$_POST[email]',
        alamat = '$_POST[alamat]'
        WHERE id_teknisi = '$id'
    ");
    echo "<script>alert('Data diperbarui!'); location='index.php';</script>";
}
?>
