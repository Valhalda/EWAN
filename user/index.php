<?php
session_start();
$_SESSION['title'] = 'Data Pemeliharaan'; // Set title untuk halaman ini
include '../config/koneksi.php';
include '../template/navbar.php';
include '../template/header.php';
?>
<div class="container d-flex flex-column min-vh-100">
    <div class="flex-fill">
        <div class="row mt-4">
            <h3>Data Pemeliharaan</h3>
            <div class="col-md-3 mt-3">
                <a href="../dashboard.php" class="btn btn-primary mb-3">Kembali</a>
                <a href="tambah.php" class="btn btn-success mb-3">+ Tambah Pemeliharaan</a>
            </div>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Username</th>
                        <th>Hak Akses</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $result = $conn->query("SELECT * FROM tuser");
                while($row = $result->fetch_assoc()):
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['alamat'] ?></td>
                        <td><?= $row['username'] ?></td>
                        <td><?= $row['hak'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id_user'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="hapus.php?id=<?= $row['id_user'] ?>" onclick="return confirm('Hapus user ini?')" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
