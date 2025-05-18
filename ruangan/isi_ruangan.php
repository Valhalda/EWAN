<?php
session_start();
$_SESSION['title'] = 'Data Ruangan'; // Set title untuk halaman ini
include '../config/koneksi.php';
include '../template/navbar.php';
include '../template/header.php';

$id_ruangan = $_GET['id_ruangan'];

// Ambil data ruangan
$ruangan = $conn->query("SELECT * FROM truangan WHERE id_ruangan = '$id_ruangan'")->fetch_assoc();

// Ambil semua komputer
$komputer = $conn->query("SELECT * FROM tkomputer");

// Ambil komputer yang sudah ditetapkan ke ruangan ini (asumsikan tabel relasi misalnya tkomputer punya id_ruangan)
$komputerDalamRuangan = $conn->query("SELECT * FROM tkomputer WHERE id_ruangan = '$id_ruangan'");
?>


<div class="container mt-4">
    <h3>Daftar Komputer untuk Ruangan: <?= $ruangan['nama_ruangan'] ?></h3>
    <!-- Form tambah komputer ke ruangan -->
    <form method="post" action="tambah_komputer_ruangan.php">
        <div class="mb-3">
            <input type="hidden" name="id_ruangan" value="<?= $id_ruangan ?>">
            <select class="form-control" name="id_komputer" required>
                <option value="">-- Pilih Komputer --</option>
                <?php while ($row = $komputer->fetch_assoc()): ?>
                    <option value="<?= $row['id_komputer'] ?>"><?= $row['nama_komputer'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
            <button class="btn btn-primary" type="submit">Tambah</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>


    <h4>Komputer di ruangan ini:</h4>
    <table class="table table-bordered table-striped">
        <tr>
            <th>No</th>
            <th>Nama Komputer</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        while ($k = $komputerDalamRuangan->fetch_assoc()):
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $k['nama_komputer'] ?></td>
                <td><a class="btn btn-sm btn-danger" href="hapus_komputer_ruangan.php?id=<?= $k['id_komputer'] ?>&ruangan=<?= $id_ruangan ?>" onclick="return confirm('Yakin hapus?')">Hapus</a></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>