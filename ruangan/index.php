<?php
session_start();
$_SESSION['title'] = 'Data Ruangan'; // Set title untuk halaman ini
include '../config/koneksi.php';
include '../template/navbar.php';
include '../template/header.php';
?>

<div class="container d-flex flex-column min-vh-100">
    <div class="flex-fill">
        <div class="row mt-4">
            <h3>Data ruangan</h3>
            <div class="col-md-3 mt-3">
                <a href="../dashboard.php" class="btn btn-primary mb-3">Kembali</a>
                <a href="tambah.php" class="btn btn-success mb-3">+ Tambah ruangan</a>
            </div>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama ruangan</th>
                        <th>Lantai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = "SELECT * FROM `truangan`";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()):
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['nama_ruangan'] ?></td>
                            <td><?= $row['lantai'] ?></td>
                            <td>
                                <a href="isi_ruangan.php?id_ruangan=<?= $row['id_ruangan'] ?>" class="btn btn-sm btn-success">Data</a>
                                <a href="edit.php?id=<?= $row['id_ruangan'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="hapus.php?id=<?= $row['id_ruangan'] ?>" onclick="return confirm('Yakin?')" class="btn btn-danger btn-sm">Hapus</a>
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