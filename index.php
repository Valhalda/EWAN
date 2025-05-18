<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Sistem Pemeliharaan Komputer</title>
    <!-- Bootstrap 5 CDN -->
    <link href="assets/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4>Login Sistem</h4>
                </div>
                <div class="card-body">
                    <form action="login/proses_login.php" method="POST">
                        <div class="mb-3">
                            <label for="user" class="form-label">Username</label>
                            <input type="text" name="user" class="form-control" id="user" required>
                        </div>
                        <div class="mb-3">
                            <label for="pass" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="pass" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Masuk</button>
                    </form>
                    <hr>
                    <a href="pendaftaran/pendaftaran.php" class="btn btn-secondary w-100">Daftar</a>
                </div>
                <div class="card-footer text-muted text-center">
                    © <?= date('Y') ?> Sistem Pemeliharaan
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
