<?php
session_start();
$_SESSION['title'] = 'Edit Perbaikan';
include '../config/koneksi.php';
include '../template/navbar.php';
include '../template/header.php';

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM tperbaikan WHERE id_perbaikan='$id'")->fetch_assoc();

// Ambil data komputer
$komputer = $conn->query("SELECT * FROM tkomputer ORDER BY nama_komputer ASC");
// Ambil data teknisi
$teknisi = $conn->query("SELECT * FROM tteknisi ORDER BY nama_teknisi ASC");
?>

<div class="container mt-4">
    <h3>Edit Data Perbaikan</h3>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="row">
            <div class="col-md-6 mb-2">
                <label>Tanggal Perbaikan</label>
                <input type="date" name="tanggal_perbaikan" class="form-control" value="<?= $data['tanggal_perbaikan'] ?>" required>
            </div>
            <div class="col-md-6 mb-2">
                <label>Komputer</label>
                <select name="id_komputer" class="form-control" required>
                    <option value="">-- Pilih Komputer --</option>
                    <?php while ($k = $komputer->fetch_assoc()): ?>
                        <option value="<?= $k['id_komputer'] ?>" <?= ($data['id_komputer'] == $k['id_komputer']) ? 'selected' : '' ?>>
                            <?= $k['nama_komputer'] ?> (<?= $k['status'] ?>)
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-6 mb-2">
                <label>Komponen yang Diperbaiki</label>
                <input type="text" name="komponen_yg_diperbaiki" class="form-control" value="<?= $data['komponen_yg_diperbaiki'] ?>" required>
            </div>
            <div class="col-md-6 mb-2">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="selesai" <?= ($data['status'] == 'selesai') ? 'selected' : '' ?>>Selesai</option>
                    <option value="dalam proses" <?= ($data['status'] == 'dalam proses') ? 'selected' : '' ?>>Dalam Proses</option>
                    <option value="menunggu part" <?= ($data['status'] == 'menunggu part') ? 'selected' : '' ?>>Menunggu Part</option>
                    <option value="batal" <?= ($data['status'] == 'batal') ? 'selected' : '' ?>>Batal</option>
                </select>
            </div>
            <div class="col-md-6 mb-2">
                <label>Teknisi</label>
                <select name="id_teknisi" class="form-control">
                    <option value="">-- Pilih Teknisi --</option>
                    <?php while ($t = $teknisi->fetch_assoc()): ?>
                        <option value="<?= $t['id_teknisi'] ?>" <?= ($data['id_teknisi'] == $t['id_teknisi']) ? 'selected' : '' ?>>
                            <?= $t['nama_teknisi'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-12 mb-2">
                <label>Deskripsi Perbaikan</label>
                <textarea name="deskripsi_perbaikan" class="form-control" rows="3" required><?= $data['deskripsi_perbaikan'] ?></textarea>
            </div>
        </div>
        <button class="btn btn-success mb-3 mt-2" name="update">Simpan</button>
        <a href="index.php" class="btn btn-primary mb-3 mt-2">Kembali</a>
    </form>
</div>

<?php
if (isset($_POST['update'])) {
    $tanggal = $_POST['tanggal_perbaikan'];
    $id_komputer = $_POST['id_komputer'];
    $komponen = $_POST['komponen_yg_diperbaiki'];
    $deskripsi = $_POST['deskripsi_perbaikan'];
    $status = $_POST['status'];
    $id_perbaikan = $_POST['id'];
    $id_teknisi = empty($_POST['id_teknisi']) ? "NULL" : "'".$_POST['id_teknisi']."'";
    
    // Simpan status komputer lama
    $status_komputer_lama = $conn->query("SELECT id_komputer FROM tperbaikan WHERE id_perbaikan='$id_perbaikan'")->fetch_assoc()['id_komputer'];
    
    $q = "UPDATE tperbaikan SET 
            tanggal_perbaikan='$tanggal',
            id_komputer='$id_komputer',
            komponen_yg_diperbaiki='$komponen',
            deskripsi_perbaikan='$deskripsi',
            status='$status',
            id_teknisi=$id_teknisi
          WHERE id_perbaikan='$id_perbaikan'";
    
    if ($conn->query($q)) {
        // Update status komputer yang baru dipilih
        if ($status == 'selesai') {
            $conn->query("UPDATE tkomputer SET status='aktif' WHERE id_komputer='$id_komputer'");
        } else {
            $conn->query("UPDATE tkomputer SET status='maintenance' WHERE id_komputer='$id_komputer'");
        }
        
        // Jika komputer diganti, kembalikan status komputer lama ke aktif
        if ($status_komputer_lama != $id_komputer) {
            $conn->query("UPDATE tkomputer SET status='aktif' WHERE id_komputer='$status_komputer_lama'");
        }
        
        echo "<script>alert('Data berhasil diperbarui'); location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui: " . $conn->error . "');</script>";
    }
}

include '../template/footer.php';
?>