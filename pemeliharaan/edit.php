<?php
session_start();
$_SESSION['title'] = 'Data Pemeliharaan'; // Set title untuk halaman ini
include '../config/koneksi.php';
include '../template/navbar.php';
include '../template/header.php';

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM tpemeliharaan WHERE id_pemeliharaan = '$id'")->fetch_assoc();

if (isset($_POST['update'])) {
    $id_komputer = $_POST['id_komputer'];
    $jenis_pemeliharaan = $_POST['jenis_pemeliharaan'];
    $tanggal_pemeliharaan = $_POST['tanggal_pemeliharaan'];
    $keterangan = $_POST['keterangan'];
    $status = $_POST['status'];
    $id_teknisi = $_POST['id_teknisi'];

    $conn->query("UPDATE tpemeliharaan SET 
        id_komputer = '$id_komputer',
        jenis_pemeliharaan = '$jenis_pemeliharaan',
        tanggal_pemeliharaan = '$tanggal_pemeliharaan',
        keterangan = '$keterangan',
        status = '$status',
        id_teknisi = '$id_teknisi'
        WHERE id_pemeliharaan = '$id'
    ");

    echo "<script>alert('Data berhasil diperbarui'); location='index.php';</script>";
}
?>

<div class="container d-flex flex-column min-vh-100">
    <div class="flex-fill">
        <div class="row mt-4">
            <h3>Update Data Pemeliharaan</h3>
            <form method="POST">
                <div class="mb-3">
                    <label for="id_komputer">Komputer</label>
                    <select name="id_komputer" class="form-control" required>
                        <option value="">-- Pilih Komputer --</option>
                        <?php
                        $komputer = $conn->query("SELECT * FROM tkomputer");
                        while ($k = $komputer->fetch_assoc()):
                        ?>
                            <option value="<?= $k['id_komputer'] ?>" <?= ($k['id_komputer'] == $data['id_komputer'] ? 'selected' : '') ?>><?= $k['nama_komputer'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jenis_pemeliharaan">Jenis Pemeliharaan</label>
                    <input type="text" name="jenis_pemeliharaan" class="form-control" value="<?= $data['jenis_pemeliharaan'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_pemeliharaan">Tanggal Pemeliharaan</label>
                    <input type="date" name="tanggal_pemeliharaan" class="form-control" value="<?= $data['tanggal_pemeliharaan'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" class="form-control"><?= $data['keterangan'] ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                        <option value="proses" <?= ($data['status'] == 'proses' ? 'selected' : '') ?>>Proses</option>
                        <option value="selesai" <?= ($data['status'] == 'selesai' ? 'selected' : '') ?>>Selesai</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="id_teknisi">Teknisi</label>
                    <select name="id_teknisi" class="form-control" required>
                        <option value="">-- Pilih Teknisi --</option>
                        <?php
                        $teknisi = $conn->query("SELECT * FROM tteknisi");
                        while ($t = $teknisi->fetch_assoc()):
                        ?>
                            <option value="<?= $t['id_teknisi'] ?>" <?= ($t['id_teknisi'] == $data['id_teknisi'] ? 'selected' : '') ?>><?= $t['nama_teknisi'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <button class="btn btn-success mb-3 mt-2" name="update">Simpan</button>
                <a href="index.php" class="btn btn-primary mb-3 mt-2">kembali</a>
            </form>
        </div>
    </div>                
</div>

<?php include '../template/footer.php'; ?>