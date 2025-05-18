<?php
session_start();
$_SESSION['title'] = 'Tambah Perbaikan';
include '../config/koneksi.php';
include '../template/navbar.php';
include '../template/header.php';

// Ambil data komputer
$komputer = $conn->query("SELECT * FROM tkomputer ORDER BY nama_komputer ASC");
// Ambil data teknisi
$teknisi = $conn->query("SELECT * FROM tteknisi ORDER BY nama_teknisi ASC");
?>

<div class="container mt-4">
    <h3>Tambah Data Perbaikan</h3>
    <form method="POST" action="">
        <div class="row">
            <div class="col-md-6 mb-2">
                <label>Tanggal Perbaikan</label>
                <input type="date" name="tanggal_perbaikan" class="form-control" required>
            </div>
            <div class="col-md-6 mb-2">
                <label>Komputer</label>
                <select name="id_komputer" class="form-control" required>
                    <option value="">-- Pilih Komputer --</option>
                    <?php while ($k = $komputer->fetch_assoc()): ?>
                        <option value="<?= $k['id_komputer'] ?>"><?= $k['nama_komputer'] ?> (<?= $k['status'] ?>)</option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-6 mb-2">
                <label>Komponen yang Diperbaiki</label>
                <input type="text" name="komponen_yg_diperbaiki" class="form-control" required>
            </div>
            <div class="col-md-6 mb-2">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="selesai">Selesai</option>
                    <option value="dalam proses">Dalam Proses</option>
                    <option value="menunggu part">Menunggu Part</option>
                    <option value="batal">Batal</option>
                </select>
            </div>
            <div class="col-md-6 mb-2">
                <label>Teknisi</label>
                <select name="id_teknisi" class="form-control">
                    <option value="">-- Pilih Teknisi --</option>
                    <?php while ($t = $teknisi->fetch_assoc()): ?>
                        <option value="<?= $t['id_teknisi'] ?>"><?= $t['nama_teknisi'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-12 mb-2">
                <label>Deskripsi Perbaikan</label>
                <textarea name="deskripsi_perbaikan" class="form-control" rows="3" required></textarea>
            </div>
        </div>
        <button class="btn btn-success mb-3 mt-2" name="simpan">Simpan</button>
        <a href="index.php" class="btn btn-primary mb-3 mt-2">Kembali</a>
    </form>
</div>

<?php
if (isset($_POST['simpan'])) {
    $tanggal = $_POST['tanggal_perbaikan'];
    $id_komputer = $_POST['id_komputer'];
    $komponen = $_POST['komponen_yg_diperbaiki'];
    $deskripsi = $_POST['deskripsi_perbaikan'];
    $status = $_POST['status'];
    $id_teknisi = empty($_POST['id_teknisi']) ? "NULL" : "'".$_POST['id_teknisi']."'";
    
    $q = "INSERT INTO tperbaikan 
            (tanggal_perbaikan, id_komputer, komponen_yg_diperbaiki, deskripsi_perbaikan, status, id_teknisi)
          VALUES 
            ('$tanggal', '$id_komputer', '$komponen', '$deskripsi', '$status', $id_teknisi)";
    
    if ($conn->query($q)) {
        // Update status komputer jika perbaikan selesai
        if ($status == 'selesai') {
            $conn->query("UPDATE tkomputer SET status='aktif' WHERE id_komputer='$id_komputer'");
        } else {
            $conn->query("UPDATE tkomputer SET status='maintenance' WHERE id_komputer='$id_komputer'");
        }
        // echo "<script>alert('Data berhasil disimpan'); location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan: " . $conn->error . "');</script>";
    }
}

include '../template/footer.php';
?>