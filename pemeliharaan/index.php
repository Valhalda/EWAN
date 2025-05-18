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
                <a href="../home/dashboard.php" class="btn btn-primary mb-3">Kembali</a>
                <a href="tambah.php" class="btn btn-success mb-3">+ Tambah Pemeliharaan</a>
            </div>
            <table id="TableIndex" class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Komputer</th>
                        <th>Jenis</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Teknisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $sql = "SELECT p.*, k.nama_komputer, t.nama_teknisi 
                        FROM tpemeliharaan p 
                        JOIN tkomputer k ON p.id_komputer = k.id_komputer 
                        JOIN tteknisi t ON p.id_teknisi = t.id_teknisi";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()):
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['nama_komputer'] ?></td>
                        <td><?= $row['jenis_pemeliharaan'] ?></td>
                        <td><?= $row['tanggal_pemeliharaan'] ?></td>
                        <td><?= $row['keterangan'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td><?= $row['nama_teknisi'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id_pemeliharaan'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="hapus.php?id=<?= $row['id_pemeliharaan'] ?>" onclick="return confirm('Yakin?')" class="btn btn-danger btn-sm">Hapus</a>
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
