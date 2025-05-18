<?php
session_start();
$_SESSION['title'] = 'Data Pemeliharaan'; // Set title untuk halaman ini
include '../config/koneksi.php';
include '../template/navbar.php';
include '../template/header.php';


$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM truangan WHERE id_ruangan = $id"));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama_ruangan'];
    $lantai = $_POST['lantai'];

    mysqli_query($conn, "UPDATE truangan SET nama_ruangan='$nama', lantai='$lantai' WHERE id_ruangan=$id");
    header('Location: index.php');
}
?>

<div class="container d-flex flex-column min-vh-100">
    <div class="flex-fill">
        <div class="row mt-4">
            <h3>Update Data Ruangan</h3>
            <form method="POST">
                <div class="mb-3">
                    <label for="nama_ruangan">Nama Ruangan</label>
                    <input type="text" name="nama_ruangan" class="form-control" value="<?= $data['nama_ruangan'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="lantai">Lantai</label>
                    <input type="text" name="lantai" class="form-control" value="<?= $data['lantai'] ?>" required>
                </div>
                <button class="btn btn-success mb-3 mt-2" name="update">Simpan</button>
                <a href="index.php" class="btn btn-primary mb-3 mt-2">kembali</a>
            </form>
        </div>
    </div>                
</div>
<?php include '../template/footer.php'; ?>
