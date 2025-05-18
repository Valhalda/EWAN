<?php
session_start();
$_SESSION['title'] = 'Data Pemeliharaan';
include '../config/koneksi.php';
include '../template/navbar.php';
include '../template/header.php';

// Ambil data ruangan
$ruangan = $conn->query("SELECT * FROM truangan");
?>

<div class="container mt-4">
    <h3>Tambah Data Komputer</h3>
    <form method="POST" action="">
        <div class="row">
            <div class="col-md-6 mb-2">
                <label>Nama Komputer</label>
                <input type="text" name="nama_komputer" class="form-control" required>
            </div>
            <div class="col-md-6 mb-2">
                <label>Tipe Komputer</label>
                <input type="text" name="tipe_komputer" class="form-control" required>
            </div>
            <div class="col-md-6 mb-2">
                <label>Prosesor</label>
                <input type="text" name="prosesor" class="form-control">
            </div>
            <div class="col-md-6 mb-2">
                <label>RAM</label>
                <input type="text" name="ram" class="form-control">
            </div>
            <div class="col-md-6 mb-2">
                <label>Penyimpanan</label>
                <input type="text" name="penyimpanan" class="form-control">
            </div>
            <div class="col-md-6 mb-2">
                <label>Sistem Operasi</label>
                <input type="text" name="sistem_operasi" class="form-control">
            </div>
            <div class="col-md-6 mb-2">
                <label>Tanggal Pembelian</label>
                <input type="date" name="tanggal_pembelian" class="form-control">
            </div>
            <div class="col-md-6 mb-2">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option>aktif</option>
                    <option>rusak</option>
                    <option>maintenance</option>
                    <option>lain-lain</option>
                </select>
            </div>
            <div class="col-md-6 mb-2">
                <label>Ruangan</label>
                <select name="id_ruangan" class="form-control" required>
                    <option value="">-- Pilih Ruangan --</option>
                    <?php while ($r = $ruangan->fetch_assoc()): ?>
                        <option value="<?= $r['id_ruangan'] ?>"><?= $r['nama_ruangan'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
        </div>
        <button class="btn btn-success mb-3 mt-2" name="simpan">Simpan</button>
        <a href="index.php" class="btn btn-primary mb-3 mt-2">Kembali</a>
    </form>
</div>

<?php
if (isset($_POST['simpan'])) {
    $q = "INSERT INTO tkomputer 
            (nama_komputer, tipe_komputer, prosesor, ram, penyimpanan, sistem_operasi, tanggal_pembelian, status, id_ruangan)
          VALUES 
            ('$_POST[nama_komputer]','$_POST[tipe_komputer]','$_POST[prosesor]','$_POST[ram]',
             '$_POST[penyimpanan]','$_POST[sistem_operasi]','$_POST[tanggal_pembelian]','$_POST[status]', '$_POST[id_ruangan]')";
    if ($conn->query($q)) {
        echo "<script>alert('Data berhasil disimpan'); location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan');</script>";
    }
}
?>
