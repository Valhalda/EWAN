<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$title = 'Sistem Pemeliharaan Komputer';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_SESSION['title'] ?></title>

    <!-- Link ke file CSS Bootstrap -->
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/bootstrap.min.css">  -->
    <link rel="stylesheet" href="style.css"> <!-- Link ke file CSS -->
    <!-- Masukkan library DataTables dan Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tabel Anda -->
</head>

<body class="bg-light">