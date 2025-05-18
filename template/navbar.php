<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$currentPage = basename($_SERVER['PHP_SELF']);
$logoutPath = ($currentPage === 'dashboard.php') ? '../login/logout.php' : '../login/logout.php';
$baseURL = '/kompjav/';
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Pemeliharaan</a>
        <div class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 light">
                <?php if ($currentPage != 'dashboard.php') : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $baseURL ?>home/dashboard.php">Dashboard</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $baseURL ?>komputer/index.php">Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $baseURL ?>pemeliharaan/index.php">Pemeliharaan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $baseURL ?>perbaikan/index.php">Perbaikan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $baseURL ?>teknisi/index.php">Teknisi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $baseURL ?>ruangan/index.php">Ruangan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $baseURL ?>user/index.php">Users</a>
                </li>
            </ul>

            <span class="text-white ms-3 me-3 mt-2">
                <?= $_SESSION['user']['nama']; ?> (<?= $_SESSION['user']['hak']; ?>)
            </span>
            <a class="btn btn-primary btn-sm" href="<?= $logoutPath ?>" onclick="return confirm('Yakin ingin logout?')">Logout</a>
        </div>
    </div>
</nav>