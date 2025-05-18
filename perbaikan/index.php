<?php
session_start();
$_SESSION['title'] = 'Data Perbaikan';
include '../config/koneksi.php';
include '../template/navbar.php';
include '../template/header.php';
?>

<div class="container d-flex flex-column min-vh-100">
    <div class="flex-fill">
        <div class="row mt-4">
            <h3>Data Perbaikan</h3>
            <div class="col-md-3 mt-3">
                <a href="../home/dashboard.php" class="btn btn-primary mb-3">Kembali</a>
                <a href="tambah.php" class="btn btn-success mb-3">+ Tambah Perbaikan</a>
            </div>
            <table id="TableIndex" class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Perbaikan</th>
                        <th>Komputer</th>
                        <th>Komponen</th>
                        <th>Deskripsi Perbaikan</th>
                        <th>Status</th>
                        <th>Teknisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $data = $conn->query("SELECT p.*, k.nama_komputer, t.nama_teknisi 
                                    FROM tperbaikan p
                                    JOIN tkomputer k ON p.id_komputer = k.id_komputer
                                    LEFT JOIN tteknisi t ON p.id_teknisi = t.id_teknisi");
                while($row = $data->fetch_assoc()):
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= date('d-m-Y', strtotime($row['tanggal_perbaikan'])) ?></td>
                        <td><?= $row['nama_komputer'] ?></td>
                        <td><?= $row['komponen_yg_diperbaiki'] ?></td>
                        <td><?= $row['deskripsi_perbaikan'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td><?= $row['nama_teknisi'] ?? 'Belum ditugaskan' ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id_perbaikan'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="hapus.php?id=<?= $row['id_perbaikan'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
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