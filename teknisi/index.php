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
            <h3>Data Teknisi</h3>
            <div class="col-md-3 mt-3">
                <a href="../dashboard.php" class="btn btn-primary mb-3">Kembali</a>
                <a href="tambah.php" class="btn btn-success mb-3">+ Tambah Pemeliharaan</a>
            </div>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Teknisi</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $sql = "SELECT * FROM tteknisi";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()):
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['nama_teknisi'] ?></td>
                        <td><?= $row['telpon'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['alamat'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id_teknisi'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="hapus.php?id=<?= $row['id_teknisi'] ?>" onclick="return confirm('Hapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php 
    include '../template/footer.php';
?>
