<?php
session_start();
$_SESSION['title'] = 'Data Pemeliharaan';
include '../config/koneksi.php';
include '../template/navbar.php';
include '../template/header.php';
?>

<div class="container mt-4">
    <h3>Tambah Data Pemeliharaan</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Komputer</label>
            <select name="id_komputer" class="form-control" required>
                <option value="">-- Pilih Komputer --</option>
                <?php
                $komputer = $conn->query("SELECT * FROM tkomputer");
                while ($k = $komputer->fetch_assoc()):
                ?>
                    <option value="<?= $k['id_komputer'] ?>"><?= $k['nama_komputer'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Jenis Pemeliharaan</label>
            <input type="text" name="jenis_pemeliharaan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Pemeliharaan</label>
            <input type="date" name="tanggal_pemeliharaan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option>proses</option>
                <option>selesai</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Teknisi</label>
            <select name="id_teknisi" class="form-control" required>
                <option value="">-- Pilih Teknisi --</option>
                <?php
                $teknisi = $conn->query("SELECT * FROM tteknisi");
                while ($t = $teknisi->fetch_assoc()):
                ?>
                    <option value="<?= $t['id_teknisi'] ?>"><?= $t['nama_teknisi'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Status Komputer Setelah Pemeliharaan</label>
            <select name="status_komputer" class="form-control">
                <option value="">(Jangan ubah status)</option>
                <option value="maintenance">Maintenance</option>
                <option value="rusak">Rusak</option>
                <option value="aktif">Aktif</option>
            </select>
        </div>
        <button class="btn btn-success mb-3 mt-2" name="simpan">Simpan</button>
        <a href="index.php" class="btn btn-primary mb-3 mt-2">Kembali</a>
    </form>
</div>

<?php
if (isset($_POST['simpan'])) {
    // Simpan ke pemeliharaan
    $simpan = $conn->query("INSERT INTO tpemeliharaan 
        (id_komputer, tanggal_pemeliharaan, jenis_pemeliharaan, keterangan, status, id_teknisi) VALUES (
        '{$_POST['id_komputer']}',
        '{$_POST['tanggal_pemeliharaan']}',
        '{$_POST['jenis_pemeliharaan']}',
        '{$_POST['keterangan']}',
        '{$_POST['status']}',
        '{$_POST['id_teknisi']}')");

    // Jika disimpan, dan user ingin update status komputer
    if ($simpan && !empty($_POST['status_komputer'])) {
        $conn->query("UPDATE tkomputer SET status = '{$_POST['status_komputer']}' WHERE id_komputer = '{$_POST['id_komputer']}'");
    }

    echo "<script>alert('Data tersimpan'); location='index.php';</script>";
}
?>
