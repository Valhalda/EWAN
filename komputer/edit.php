<?php
session_start();
$_SESSION['title'] = 'Data Pemeliharaan'; // Set title untuk halaman ini
include '../config/koneksi.php';
include '../template/navbar.php';
include '../template/header.php';

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM tkomputer WHERE id_komputer='$id'")->fetch_assoc();
?>

<div class="container mt-4">
    <h3>Edit Komputer</h3>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="mb-3">
            <label>Nama Komputer</label>
            <input type="text" name="nama_komputer" class="form-control" value="<?= $data['nama_komputer'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option <?= ($data['status'] == 'aktif' ? 'selected' : '') ?>>aktif</option>
                <option <?= ($data['status'] == 'rusak' ? 'selected' : '') ?>>rusak</option>
                <option <?= ($data['status'] == 'maintenance' ? 'selected' : '') ?>>maintenance</option>
                <option <?= ($data['status'] == 'lain-lain' ? 'selected' : '') ?>>lain-lain</option>
            </select>
        </div>
        <button class="btn btn-success mb-3 mt-2" name="update">Simpan</button>
        <a href="index.php" class="btn btn-primary mb-3 mt-2">kembali</a>
    </form>
</div>

<?php
if (isset($_POST['update'])) {
    $conn->query("UPDATE tkomputer SET 
        nama_komputer='$_POST[nama_komputer]',
        status='$_POST[status]' 
        WHERE id_komputer='$_POST[id]'");
    echo "<script>alert('Data diperbarui'); location='index.php';</script>";
}
?>
