<?php
session_start();
$_SESSION['title'] = 'Data Pemeliharaan'; // Set title untuk halaman ini
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
include '../template/header.php';
include '../template/navbar.php';
?>

<div class="container d-flex flex-column min-vh-100">
    <div class="mt-4">
        <h3>Selamat datang, <?= $_SESSION['user']['nama']; ?>!</h3>
        <p class="text-muted">Anda login sebagai <strong><?= $_SESSION['user']['hak']; ?></strong></p>
        <div class="flex-fill">
            <div class="row mt-4">
                <div class="col-md-3 p-2">
                    <div class="card border-0 shadow-sm bg-white">
                        <div class="card-body">
                            <h5 class="card-title">Data Komputer</h5>
                            <p class="card-text">Lihat semua data komputer</p>
                            <a href="../komputer/index.php" class="btn btn-primary btn-sm">Lihat</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 p-2">
                    <div class="card border-0 shadow-sm bg-white">
                        <div class="card-body">
                            <h5 class="card-title">Pemeliharaan</h5>
                            <p class="card-text">Riwayat & Jadwal</p>
                            <a href="../pemeliharaan/index.php" class="btn btn-primary btn-sm">Lihat</a>
                        </div>
                    </div>
                </div>
                <?php if ($_SESSION['user']['hak'] == 'admin') { ?>
                <div class="col-md-3 p-2">
                    <div class="card border-0 shadow-sm bg-white">
                        <div class="card-body">
                            <h5 class="card-title">Kelola Teknisi</h5>
                            <p class="card-text">Tambah/edit teknisi</p>
                            <a href="../teknisi/index.php" class="btn btn-primary btn-sm">Lihat</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 p-2">
                    <div class="card border-0 shadow-sm bg-white">
                        <div class="card-body">
                            <h5 class="card-title">Kelola ruangan</h5>
                            <p class="card-text">Tambah/edit ruangan</p>
                            <a href="../ruangan/index.php" class="btn btn-primary btn-sm">Lihat</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 p-2">
                    <div class="card border-0 shadow-sm bg-white">
                        <div class="card-body">
                            <h5 class="card-title">Data Pengguna</h5>
                            <p class="card-text">Kelola akun admin/petugas</p>
                            <a href="../user/index.php" class="btn btn-primary btn-sm">Lihat</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php 
    include '../template/footer.php';
?>
