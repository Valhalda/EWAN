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
            <h3>Data Komputer</h3>
            <div class="col-md-3 mt-3">
                <a href="../home/dashboard.php" class="btn btn-primary mb-3">Kembali</a>
                <a href="tambah.php" class="btn btn-success mb-3">+ Tambah Komputer</a>
            </div>
            <table id="TableIndex" class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Komputer</th>
                        <th>Tipe</th>
                        <th>Prosesor</th>
                        <th>RAM</th>
                        <th>Penyimpanan</th>
                        <th>Sistem Operasi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $data = $conn->query("SELECT * FROM tkomputer");
                while($row = $data->fetch_assoc()):
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['nama_komputer'] ?></td>
                        <td><?= $row['tipe_komputer'] ?></td>
                        <td><?= $row['prosesor'] ?></td>
                        <td><?= $row['ram'] ?></td>
                        <td><?= $row['penyimpanan'] ?></td>
                        <td><?= $row['sistem_operasi'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id_komputer'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="hapus.php?id=<?= $row['id_komputer'] ?>" onclick="return confirm('Yakin?')" class="btn btn-danger btn-sm">Hapus</a>
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
